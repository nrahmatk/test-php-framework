# Quick Commands untuk Debug 502 Error

## 1. Generate APP_KEY (PALING PENTING!)

```bash
php artisan key:generate --show
```

Copy output ke Coolify environment variables sebagai `APP_KEY`

## 2. Cek Status di Coolify Terminal

```bash
# Cek semua service
supervisorctl status

# Cek PHP-FPM
ps aux | grep php-fpm

# Cek Nginx
ps aux | grep nginx

# Cek Laravel logs
tail -n 100 storage/logs/laravel.log

# Cek Nginx error logs
tail -n 100 /var/log/nginx/error.log
```

## 3. Fix Permissions

```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

## 4. Clear Cache

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

## 5. Restart Services

```bash
# Restart PHP-FPM
supervisorctl restart php-fpm

# Restart Nginx
supervisorctl restart nginx

# Restart all
supervisorctl restart all
```

## 6. Test PHP

```bash
# Cek PHP version
php -v

# Cek Laravel
php artisan --version

# Test artisan
php artisan list
```

## Environment Variables yang WAJIB

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## Jika Pakai Database

```env
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

**Langkah Pertama:** Generate APP_KEY dan set di Coolify!
