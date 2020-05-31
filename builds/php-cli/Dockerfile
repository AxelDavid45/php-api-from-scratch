FROM php:7.4-cli
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Keep alive the container
CMD tail -f /var/log/wtmp > /dev/null