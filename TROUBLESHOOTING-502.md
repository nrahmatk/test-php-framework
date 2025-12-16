# 502 Bad Gateway - Troubleshooting Guide

## Status: Deployment Berhasil, tapi 502 Bad Gateway

Build berhasil ✅, tapi aplikasi mengembalikan 502 error. Ini berarti ada masalah runtime.

## Quick Fix Steps

### 1. Cek Logs di Coolify

Di Coolify dashboard:

1. Klik pada aplikasi Anda
2. Pilih tab **"Logs"**
3. Cari error messages

**Yang perlu dicari:**

-   PHP-FPM errors
-   Nginx errors
-   Laravel errors
-   Supervisor errors

### 2. Cek Environment Variables

Pastikan environment variables sudah di-set dengan benar di Coolify:

**WAJIB:**

```env
APP_KEY=base64:YOUR_KEY_HERE
APP_ENV=production
APP_DEBUG=false
```

**Jika APP_KEY belum di-set:**

```bash
# Di lokal, generate key:
php artisan key:generate --show

# Copy output (termasuk "base64:") ke Coolify environment variables
```

### 3. Cek Database Connection (Jika Ada)

Jika menggunakan database:

```env
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Tips:**

-   Pastikan database host bisa diakses dari container
-   Jika database di Coolify juga, gunakan internal hostname
-   Test connection dari Coolify terminal

### 4. Akses Container Terminal

Di Coolify:

1. Klik aplikasi → **"Terminal"**
2. Jalankan diagnostic commands:

```bash
# Cek PHP-FPM status
ps aux | grep php-fpm

# Cek Nginx status
ps aux | grep nginx

# Cek supervisor status
supervisorctl status

# Cek Laravel logs
tail -n 50 /var/www/html/storage/logs/laravel.log

# Test PHP
php artisan --version

# Cek permissions
ls -la /var/www/html/storage
ls -la /var/www/html/bootstrap/cache
```

### 5. Common Issues & Fixes

#### Issue: APP_KEY tidak di-set

**Symptom:** Laravel error "No application encryption key"

**Fix:**

```bash
# Generate di lokal
php artisan key:generate --show

# Set di Coolify environment variables
APP_KEY=base64:xxxxxxxxxxxxx
```

#### Issue: Storage permissions

**Symptom:** "Permission denied" errors

**Fix di Coolify terminal:**

```bash
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache
```

#### Issue: PHP-FPM crash

**Symptom:** Nginx can't connect to PHP-FPM

**Fix:**

```bash
# Restart supervisor
supervisorctl restart php-fpm

# Atau restart container di Coolify
```

#### Issue: Database connection failed

**Symptom:** "SQLSTATE[HY000]" errors

**Fix:**

-   Verify database credentials
-   Check database host accessibility
-   Ensure database exists

#### Issue: Cache corruption

**Symptom:** Various Laravel errors

**Fix di Coolify terminal:**

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

### 6. Restart Container

Di Coolify dashboard:

1. Klik aplikasi
2. Klik **"Restart"**
3. Monitor logs

### 7. Redeploy dengan Fixes

Setelah update environment variables atau code:

```bash
# Di lokal (jika ada perubahan code)
git add .
git commit -m "Fix 502 error"
git push

# Di Coolify
# Klik "Redeploy"
```

## Debugging Checklist

-   [ ] APP_KEY sudah di-set di environment variables
-   [ ] APP_ENV=production
-   [ ] Database credentials benar (jika pakai database)
-   [ ] Cek logs di Coolify untuk error messages
-   [ ] PHP-FPM running (cek dengan `ps aux | grep php-fpm`)
-   [ ] Nginx running (cek dengan `ps aux | grep nginx`)
-   [ ] Storage permissions benar (775, owned by www-data)
-   [ ] .env file exists di container

## Advanced Debugging

### Enable Debug Mode (Temporary)

**WARNING: Only for debugging, disable after fixing!**

Di Coolify environment variables:

```env
APP_DEBUG=true
APP_ENV=local
```

Redeploy, lalu akses aplikasi. Error message akan lebih detail.

**IMPORTANT:** Set kembali ke production setelah debugging:

```env
APP_DEBUG=false
APP_ENV=production
```

### Check Nginx Configuration

Di Coolify terminal:

```bash
# Test nginx config
nginx -t

# View nginx error log
tail -n 50 /var/log/nginx/error.log
```

### Check PHP-FPM Configuration

```bash
# Check PHP-FPM config
php-fpm -t

# View PHP-FPM error log
tail -n 50 /var/log/php-fpm.log
```

## Most Common Fix

**90% of 502 errors are caused by missing APP_KEY!**

```bash
# Generate key
php artisan key:generate --show

# Output example:
# base64:abcdefghijklmnopqrstuvwxyz1234567890ABCDEFG=

# Add to Coolify environment variables:
APP_KEY=base64:abcdefghijklmnopqrstuvwxyz1234567890ABCDEFG=

# Redeploy or restart
```

## Still Not Working?

1. **Check Coolify logs** - Most detailed error info
2. **Access terminal** - Run diagnostic commands
3. **Enable debug mode** - See exact error
4. **Check database** - If using database
5. **Restart container** - Fresh start
6. **Redeploy** - With updated environment variables

## Get Help

Jika masih error setelah semua langkah di atas:

1. Copy error messages dari logs
2. Screenshot environment variables (hide sensitive data)
3. Share diagnostic output:
    ```bash
    supervisorctl status
    php artisan --version
    ls -la storage/
    ```

---

**Next Step:** Cek logs di Coolify dan jalankan diagnostic commands di terminal!
