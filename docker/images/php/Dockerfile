FROM php:7.4.10-fpm-alpine

LABEL mainainer=""
#

RUN apk update && apk add git zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN deluser www-data

RUN adduser -D -u 1000 www-data www-data

RUN docker-php-ext-install pdo pdo_mysql
