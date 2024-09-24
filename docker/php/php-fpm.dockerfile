FROM php:fpm
RUN docker-php-ext-install mysqli
WORKDIR /var/www/html
