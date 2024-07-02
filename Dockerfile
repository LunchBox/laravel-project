FROM php:8.2-apache

# Install composer and its dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y libzip-dev vim \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# create user & group with same uid & gid with the host
RUN groupadd -g 1000 cpttm && useradd -u 1000 -g cpttm cpttm

# prepare a .bashrc for adding NVM env
RUN mkdir /home/cpttm && touch /home/cpttm/.bashrc && chown cpttm:cpttm -R /home/cpttm

# install NVM
RUN runuser -l cpttm -c 'curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash'
RUN runuser -l cpttm -c '\. ~/.bashrc && nvm install stable'

# nav to working space
WORKDIR /var/www/html/laravel_dev

# make a soft link to test the project in subdomain
RUN ln -s /var/www/html/laravel_dev/public /var/www/html/laravel-20240702

# make sure the link belongs to www-data
# use the '-h' option to change owner of the link only
RUN chown -h www-data:www-data /var/www/html/laravel-20240702
