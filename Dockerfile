FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev libsqlite3-dev nodejs npm \
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd zip \
    && pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader && \
    npm ci && npm run build && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

CMD mkdir -p /data && touch /data/database.sqlite && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan event:cache && \
    php artisan serve --host=0.0.0.0 --port=8080
