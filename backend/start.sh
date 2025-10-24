#!/bin/bash

# Start script for Railway deployment
echo "Starting Laravel application..."

# Clear all caches to ensure fresh start
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Run migrations
php artisan migrate --force

# Cache configuration for better performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if it doesn't exist
php artisan storage:link || true

# Start PHP built-in server
php artisan serve --host=0.0.0.0 --port=$PORT