# Use official PHP with Apache
FROM php:8.2-apache

# Copy your app files into Apache's default web root
COPY . /var/www/html/

# Install common PHP extensions (optional — add/remove as needed)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose Apache's port (80 inside container)
EXPOSE 80
