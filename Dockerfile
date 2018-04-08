FROM php:7.1-alpine

RUN apk update && apk add build-base

RUN apk add zlib-dev git zip \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /app

COPY composer.json .
COPY composer.lock .

RUN composer install --prefer-source --no-interaction

COPY . .

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"
