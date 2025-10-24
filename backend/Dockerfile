FROM php:8.2-cli

# Install system dependencies
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

# Set working directory
WORKDIR /app

# Copy composer files first (for caching)
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
    echo '' >> /start.sh && \
    echo '# Clear caches' >> /start.sh && \
    echo 'php artisan config:clear' >> /start.sh && \
    echo 'php artisan cache:clear' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Generate app key if not set' >> /start.sh && \
    echo 'if [ -z "$APP_KEY" ]; then' >> /start.sh && \
    echo '  php artisan key:generate --force' >> /start.sh && \
    echo 'fi' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Run migrations if database is available' >> /start.sh && \
    echo 'php artisan migrate --force || echo "Migration failed, continuing..."' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Create storage link' >> /start.sh && \
    echo 'php artisan storage:link || echo "Storage link failed, continuing..."' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Start Laravel server' >> /start.sh && \
    echo 'echo "Starting Laravel server on port ${PORT:-8000}..."' >> /start.sh && \
    echo 'exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}' >> /start.sh && \
    chmod +x /start.sh

# Expose port
EXPOSE ${PORT:-8000}

# Use start script
CMD ["/start.sh"]