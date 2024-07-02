FROM php:8.2-apache

# Install composer and its dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y libzip-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

# Configure apache
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && a2enmod rewrite \
    && docker-php-ext-install pdo_mysql

# nav to working space
WORKDIR /var/www/html/laravel_dev

# make a soft link to test the project in subdomain
RUN ln -s /var/www/html/laravel_dev/public /var/www/html/laravel-20240702
