FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql
    
WORKDIR /var/www/html
COPY . /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER root
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
