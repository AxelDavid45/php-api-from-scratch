FROM php:7.4-fpm
WORKDIR /var/www
RUN rm -r html
RUN apt update && apt install -y libzip-dev unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 9000
