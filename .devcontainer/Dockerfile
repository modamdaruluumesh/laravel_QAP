FROM mcr.microsoft.com/devcontainers/php:8.2

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
 && apt-get install -y git unzip libzip-dev libpng-dev libonig-dev libxml2-dev default-mysql-client nodejs npm redis-tools \
 && docker-php-ext-install pdo pdo_mysql zip gd mbstring xml
RUN apt-get update && \
    apt-get install -y libssl-dev pkg-config && \
    pecl install redis && \
    docker-php-ext-enable redis

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /workspace
