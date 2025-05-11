FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    sqlite3 \
    libsqlite3-dev \
    zip \
    unzip \
    git \
    curl \
    dnsutils \
    netcat-openbsd && \
    docker-php-ext-install pdo_mysql pdo_sqlite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy composer files for caching dependencies first
COPY composer.json composer.lock ./

# Install PHP dependencies (without running scripts or autoloading yet)
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the Laravel application
COPY . .

# Rebuild autoload files
RUN composer dump-autoload

# Wait for MySQL to be ready before starting Laravel's built-in server.
# The command loops until a connection to 'db' on port 3306 can be established.
CMD ["sh", "-c", "until nc -z db 3306; do echo 'Waiting for MySQL...'; sleep 1; done && php artisan serve --host=0.0.0.0 --port=8000"]