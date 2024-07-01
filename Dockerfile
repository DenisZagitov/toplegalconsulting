FROM php:apache

RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libmariadb-dev tzdata && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html