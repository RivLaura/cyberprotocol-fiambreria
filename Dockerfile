FROM php:8.4-apache

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Instalar extensiones PHP y herramientas
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev libsqlite3-dev libcurl4-openssl-dev nodejs npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) pdo_sqlite mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN php -v && php -m
RUN composer install --optimize-autoloader --no-interaction 2>&1
RUN npm ci --loglevel verbose 2>&1
RUN npm run build 2>&1
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configurar Apache para servir desde /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 8080

CMD mkdir -p /data && chown www-data:www-data /data && \
    touch /data/database.sqlite && chown www-data:www-data /data/database.sqlite && \
    php artisan storage:link --force 2>&1 || true && \
    php artisan migrate --force 2>&1 && \
    php artisan db:seed --force 2>&1 && \
    php artisan config:cache 2>&1 && \
    php artisan route:cache 2>&1 && \
    php artisan view:cache 2>&1 && \
    php artisan event:cache 2>&1 && \
    sed -i "s/80/${PORT:-8080}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && \
    apache2-foreground
