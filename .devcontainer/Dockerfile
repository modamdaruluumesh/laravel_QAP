FROM mcr.microsoft.com/devcontainers/php:8.2

# Install system dependencies
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y \
       git unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
       default-mysql-client nodejs npm \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring xml

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /workspace
