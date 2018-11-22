FROM php:7.2.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
&& apt-get install git libpng-dev libfreetype6-dev libjpeg62-turbo-dev libxpm-dev libvpx-dev zlib1g-dev -y

RUN pecl install -o -f redis \
&& pecl install -o -f xdebug \
&& rm -rf /tmp/pear \
&& echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
&& echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-configure opcache --enable-opcache \
&& docker-php-ext-install opcache \
&& docker-php-ext-install posix \
&& docker-php-ext-install pcntl \
&& docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-configure gd \
    --with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
&& docker-php-ext-install gd zip


RUN apt-get autoremove \
&& apt-get clean
