FROM php:7.4-apache

RUN apt-get update && apt-get upgrade -y

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        apt-utils \
        dos2unix \
        libmemcached-dev zlib1g-dev \
        git libzip-dev unzip \
        libicu-dev \
        libpng-dev libmagickwand-dev xfonts-75dpi xfonts-base exiftool \
        nano \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && docker-php-ext-configure exif \
    && pecl install apcu \
    && pecl install imagick \
    && pecl install memcached \
    && docker-php-ext-install bcmath exif gd intl mysqli pdo pdo_mysql zip \
    && docker-php-ext-enable bcmath exif gd intl mysqli pdo pdo_mysql zip memcached imagick apcu

WORKDIR "/var/www/jobeet"

RUN git clone --single-branch --branch php7 https://github.com/welante/symfony1-php5.5.git /var/lib/symfony/1.4
