FROM php:fpm

# Installiere MySQLi-Erweiterung
RUN docker-php-ext-install mysqli

