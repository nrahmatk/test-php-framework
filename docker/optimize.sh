#!/bin/bash

# Production Optimization Script
# Run this after deployment to optimize Laravel application

echo "🚀 Starting Laravel optimization..."

# Clear all caches
echo "📦 Clearing caches..."
php artisan optimize:clear

# Cache configuration
echo "⚙️  Caching configuration..."
php artisan config:cache

# Cache routes
echo "🛣️  Caching routes..."
php artisan route:cache

# Cache views
echo "👁️  Caching views..."
php artisan view:cache

# Cache events
echo "📡 Caching events..."
php artisan event:cache

# Optimize autoloader
echo "🔧 Optimizing autoloader..."
composer dump-autoload --optimize --classmap-authoritative

# Set proper permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✅ Optimization complete!"
