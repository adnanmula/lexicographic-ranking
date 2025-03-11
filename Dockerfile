FROM php:7.4-fpm-alpine

RUN apk update && \
    apk add --no-cache \
        libzip-dev \
        git \
        openssl-dev && \
    docker-php-ext-install -j$(nproc) \
        zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

ENV PATH /var/app/bin:/var/app/vendor/bin:$PATH

WORKDIR /var/app