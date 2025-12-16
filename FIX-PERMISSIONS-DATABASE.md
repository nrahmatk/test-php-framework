# Fix: Permission Denied & Database Configuration

## Issues Fixed

### 1. Permission Denied for Laravel Logs ✅

**Problem:**

```
The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened in append mode: Permission denied
```

**Root Cause:**

-   Storage directories tidak dibuat dengan permissions yang benar
-   Log file tidak ada saat container start

**Solution Applied:**

#### Updated `Dockerfile`:

-   Create all storage directories
-   Create log file
-   Set proper permissions (775)
-   Owner: www-data

#### Updated `docker/entrypoint.sh`:

-   Ensure directories exist at runtime
-   Create log file if missing
-   Reset permissions on every start

### 2. Database Configuration Issue

**Problem:**

```
Database file at path [/var/www/html/database/database.sqlite] does not exist
```

**Root Cause:**

-   Default Laravel config menggunakan SQLite
-   Environment variables belum di-set untuk MySQL

## Required Environment Variables di Coolify

### Minimal Configuration (WAJIB)

```env
# Application
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://laravel.aito.my.id

# Database - PILIH SALAH SATU:
```

### Option A: Menggunakan MySQL (Recommended)

```env
DB_CONNECTION=mysql
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Jika database di Coolify:**

-   `DB_HOST`: Gunakan internal hostname dari Coolify (biasanya nama service database)
-   Contoh: `DB_HOST=mysql-laravel` atau sesuai nama database resource di Coolify

### Option B: Menggunakan SQLite (Simple, tapi tidak recommended untuk production)

```env
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite
```

**Jika pakai SQLite, perlu update Dockerfile:**

```dockerfile
# Tambahkan setelah create storage structure
RUN mkdir -p /var/www/html/database \
    && touch /var/www/html/database/database.sqlite \
    && chown -R www-data:www-data /var/www/html/database \
    && chmod -R 775 /var/www/html/database
```

### Additional Environment Variables (Optional tapi Recommended)

```env
# Cache & Session
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

# Queue
QUEUE_CONNECTION=database

# Logging
LOG_CHANNEL=stack
LOG_LEVEL=error

# Broadcasting
BROADCAST_DRIVER=log
```

## Steps to Fix

### 1. Set Environment Variables di Coolify

1. Buka Coolify dashboard
2. Pilih aplikasi **laravel-test**
3. Tab **"Environment Variables"**
4. Tambahkan semua variables di atas
5. **Save**

### 2. Generate APP_KEY (Jika Belum)

Di lokal:

```bash
php artisan key:generate --show
```

Copy output (termasuk `base64:`) ke Coolify environment variable `APP_KEY`

### 3. Setup Database

#### Jika Menggunakan MySQL:

**Option A: Database sudah ada di VPS**

-   Set `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

**Option B: Buat database baru di Coolify**

1. Coolify → **+ New** → **Database** → **MySQL**
2. Set nama, username, password
3. Copy connection details ke environment variables aplikasi

### 4. Commit & Push Perubahan

```bash
git add .
git commit -m "Fix: Storage permissions and add database configuration"
git push origin test
```

### 5. Redeploy

Di Coolify:

1. Klik **"Redeploy"**
2. Monitor logs
3. Pastikan tidak ada error permission

### 6. Run Migrations (Jika Perlu)

Setelah deployment berhasil, di Coolify terminal:

```bash
# Jika ada tables yang perlu dibuat
php artisan migrate --force

# Atau uncomment di entrypoint.sh:
# php artisan migrate --force
```

## Verification

Setelah redeploy, cek:

1. **Aplikasi bisa diakses** tanpa error
2. **Logs bisa ditulis**:

    ```bash
    # Di Coolify terminal
    ls -la /var/www/html/storage/logs/
    tail -f /var/www/html/storage/logs/laravel.log
    ```

3. **Database connection**:
    ```bash
    php artisan migrate:status
    ```

## Troubleshooting

### Masih Permission Error?

Di Coolify terminal:

```bash
# Reset permissions
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage

# Restart
supervisorctl restart all
```

### Database Connection Error?

```bash
# Test connection
php artisan tinker
>>> DB::connection()->getPdo();
```

Jika error, cek:

-   Database credentials benar
-   Database host accessible
-   Database exists
-   User has permissions

---

**Status**: ✅ Permission fixes applied, ready to redeploy with proper environment variables
