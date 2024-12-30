FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql
    
COPY . /var/www/html
WORKDIR /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER root
RUN chmod o+w /var/www/
RUN chown -R www-data:www-data /var/www/html
RUN git config --global --add safe.directory /var/www/html

USER www-data
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

USER root
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

USER www-data