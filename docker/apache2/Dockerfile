# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

ARG NODE_VERSION=18

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip
RUN apt-get update && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 dnsutils

# Install nodejs and npm
RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
        && apt-get install -y nodejs \
        && npm install -g npm

# Install Composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Enable Apache2 rewrite module
RUN a2enmod rewrite

# Set proper file permissions using the 'sail' user and group
RUN usermod -l sail www-data
RUN groupmod -n sail www-data
RUN usermod -u 1000 sail && groupmod -g 1000 sail
RUN chown -R 1000:1000 /var/www

COPY ./envvars /etc/apache2/envvars
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./sites-available /etc/apache2/sites-available
COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chmod +x /usr/local/bin/start-container

# on production you can put your keys in docker/apache2/ssl/ and uncomment :443 in sites-available/000-default.conf
#COPY ./ssl/fullchain.pem /etc/apache2/ssl/fullchain.pem
#COPY ./ssl/privkey.pem /etc/apache2/ssl/privkey.pem
#RUN a2enmod ssl


# Start Apache2 service
ENTRYPOINT ["start-container"]