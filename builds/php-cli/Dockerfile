FROM php:7.4-cli

RUN apt update && apt install -y libzip-dev unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install mysqli pdo pdo_mysql
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

RUN rm -r html

# Keep alive the container
CMD tail -f /var/log/wtmp > /dev/null