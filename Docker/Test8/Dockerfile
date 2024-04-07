# Dockerfile
FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Update the default Apache site configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copy the PHP application files to the container
COPY ./www /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Expose port 801
EXPOSE 808

# Start Apache in the foreground
CMD ["apache2-foreground"]

