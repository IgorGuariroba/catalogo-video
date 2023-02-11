FROM php:8.1.1-fpm

COPY 99-xdebug.ini "${PHP_INI_DIR}/conf.d"

RUN apt-get update && apt-get install -y git && \
  pecl install xdebug && docker-php-ext-enable xdebug


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /usr/share/nginx/html