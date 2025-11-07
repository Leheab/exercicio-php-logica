FROM php:8.3-apache

RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

CMD ["apache2-foreground"]
