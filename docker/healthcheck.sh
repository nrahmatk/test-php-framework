#!/bin/sh

# Health check script for Docker container
# This script checks if the application is running properly

# Check if Nginx is running
if ! pgrep -x "nginx" > /dev/null; then
    echo "Nginx is not running"
    exit 1
fi

# Check if PHP-FPM is running
if ! pgrep -x "php-fpm" > /dev/null; then
    echo "PHP-FPM is not running"
    exit 1
fi

# Check if application responds
if ! curl -f http://localhost:80 > /dev/null 2>&1; then
    echo "Application is not responding"
    exit 1
fi

echo "Health check passed"
exit 0
