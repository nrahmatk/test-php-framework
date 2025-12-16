#!/bin/bash
set -e

echo "🚀 Starting Laravel application setup..."

# Wait for database to be ready (if using external database)
if [ -n "$DB_HOST" ]; then
    echo "⏳ Waiting for database connection..."
    until php artisan db:show 2>/dev/null; do
        echo "Database is unavailable - sleeping"
        sleep 2
    done
    echo "✅ Database is ready!"
fi

# Create storage directories if they don't exist
echo "📁 Setting up storage directories..."
mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache

# Set proper permissions
echo "🔐 Setting permissions..."
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Cache configuration for better performance
echo "⚡ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (optional, comment out if you don't want auto-migration)
if [ "${RUN_MIGRATIONS}" = "true" ]; then
    echo "🗄️  Running database migrations..."
    php artisan migrate --force --no-interaction
fi

# Link storage (if not already linked)
if [ ! -L /var/www/html/public/storage ]; then
    echo "🔗 Creating storage link..."
    php artisan storage:link
fi

echo "✨ Application setup complete!"

# Execute the main command
exec "$@"
