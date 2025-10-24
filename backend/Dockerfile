FROM php:8.2-cli

# Install minimal dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy application code
COPY . .

# Run composer scripts
RUN composer run-script post-autoload-dump

# Set permissions
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage \
    && chmod -R 755 /app/bootstrap/cache

# Create simple start script
RUN echo '#!/bin/bash' > /start.sh && \
    echo 'set -e' >> /start.sh && \
    echo 'echo "=== CONTAINER STARTING ==="' >> /start.sh && \
    echo 'echo "PORT: ${PORT:-8000}"' >> /start.sh && \
    echo 'echo "APP_URL: $APP_URL"' >> /start.sh && \
    echo 'echo "PWD: $(pwd)"' >> /start.sh && \
    echo 'echo "PHP Version: $(php -v | head -1)"' >> /start.sh && \
    echo 'echo "=== CLEARING CONFIG ==="' >> /start.sh && \
    echo 'php artisan config:clear || echo "Config clear failed"' >> /start.sh && \
    echo 'echo "=== STARTING SERVER ==="' >> /start.sh && \
    echo 'echo "Starting server on 0.0.0.0:${PORT:-8000}"' >> /start.sh && \
    echo 'exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}' >> /start.sh && \
    chmod +x /start.sh

EXPOSE ${PORT:-8000}

CMD ["/start.sh"]