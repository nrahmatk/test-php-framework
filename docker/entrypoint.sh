#!/bin/bash
set -e

echo "========================================="
echo "Starting Laravel application..."
echo "========================================="

# Check if .env exists
if [ ! -f .env ]; then
    echo "WARNING: .env file not found!"
    echo "Creating .env from .env.example..."
    cp .env.example .env
fi

# Wait for database to be ready (if using MySQL/PostgreSQL)
if [ ! -z "$DB_HOST" ]; then
    echo "Waiting for database at $DB_HOST:${DB_PORT:-3306}..."
    RETRIES=30
    until nc -z -v -w30 $DB_HOST ${DB_PORT:-3306} || [ $RETRIES -eq 0 ]
    do
        echo "Waiting for database connection... ($RETRIES attempts left)"
        RETRIES=$((RETRIES-1))
        sleep 2
    done
    
    if [ $RETRIES -eq 0 ]; then
        echo "WARNING: Could not connect to database, continuing anyway..."
    else
        echo "Database is ready!"
    fi
fi

# Set correct permissions first
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel optimizations (with error handling)
echo "Running Laravel optimizations..."

# Clear old cache first
echo "Clearing old cache..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan cache:clear || true

# Cache configurations
echo "Caching configurations..."
php artisan config:cache || echo "WARNING: Config cache failed, continuing..."
php artisan route:cache || echo "WARNING: Route cache failed, continuing..."
php artisan view:cache || echo "WARNING: View cache failed, continuing..."

# Run migrations (optional, uncomment if needed)
# php artisan migrate --force

echo "========================================="
echo "Laravel application ready!"
echo "Starting supervisord..."
echo "========================================="

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
