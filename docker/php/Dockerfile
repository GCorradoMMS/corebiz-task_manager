FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql
    
WORKDIR /var/www/html

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html
COPY --chown=www-data:www-data . /var/www/html/

USER www-data

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer