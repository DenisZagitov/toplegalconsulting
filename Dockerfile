# Используем базовый образ PHP с Apache
FROM php:7.4-apache

# Установка необходимых пакетов для компиляции PHP расширений
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libmcrypt-dev libmariadb-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql

# Копирование файлов проекта в контейнер
COPY . /var/www/html

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html