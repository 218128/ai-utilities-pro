# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite for our router
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Configure Apache DocumentRoot to point to /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf .conf

# Set permissions (optional but good practice)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
