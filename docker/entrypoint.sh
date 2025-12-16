#!/bin/bash
set -e

echo "Starting Laravel application..."

# Wait for database to be ready (if using MySQL/PostgreSQL)
if [ ! -z "$DB_HOST" ]; then
    echo "Waiting for database..."
    until nc -z -v -w30 $DB_HOST ${DB_PORT:-3306}
    do
        echo "Waiting for database connection..."
        sleep 5
    done
    echo "Database is ready!"
fi

# Run Laravel optimizations
echo "Running Laravel optimizations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (optional, uncomment if needed)
# php artisan migrate --force

# Set correct permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting supervisord..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
