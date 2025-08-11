FROM php:8.4-fpm-alpine

RUN apk update && \
    apk add --no-cache \
        libzip-dev \
        git \
        linux-headers \
        $PHPIZE_DEPS \
    && docker-php-ext-install -j$(nproc) \
        zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

COPY /php.ini /usr/local/etc/php/

ENV PATH /var/app/bin:/var/app/vendor/bin:$PATH

WORKDIR /var/app
