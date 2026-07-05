#!/bin/bash
set -e

# Crear archivo de base de datos si no existe
mkdir -p "$(dirname "$DB_DATABASE")"
touch "$DB_DATABASE"

# Migrar y cachear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Iniciar PHP-FPM (Render lo necesita para PHP native)
php-fpm
