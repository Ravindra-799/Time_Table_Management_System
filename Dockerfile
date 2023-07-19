# base public image
FROM php:8.1.1-apache
COPY ./ /var/www/html
#install the mysqli module
RUN docker-php-ext-install mysqli
