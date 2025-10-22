# Use the official PHP 8.3 FPM image on Alpine Linux as our base
FROM php:8.3-fpm-alpine

# Install system packages required by common PHP extensions (and Composer)
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libzip-dev

# Install the PHP extensions we'll need (including MySQL support!)
RUN docker-php-ext-install -j$(nproc) \
    bcmath \
    pdo \
    pdo_mysql \
    mysqli \
    zip

# --- NEW SECTION: Install Composer ---
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
# --- End of New Section ---

# Set the working directory for the application
WORKDIR /var/www/html
