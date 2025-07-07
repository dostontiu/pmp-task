FROM php:8.2.0-fpm

# Install all necessary PHP extensions
RUN apt-get update && apt-get install -y libbz2-dev libcurl4-openssl-dev libxml2-dev libzip-dev libgd-dev zlib1g-dev libicu-dev pkg-config libpq-dev libssl-dev build-essential
RUN docker-php-ext-install curl intl gd zip pdo pdo_pgsql

# Install Redis PHP extension
RUN pecl install redis && docker-php-ext-enable redis

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY .env.example .env
COPY --chown=www-data:www-data . /var/www/html
#RUN composer install

# Laravel uchun keshlarni sozlash
# RUN php artisan config:cache && php artisan route:cache
