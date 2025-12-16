# Environment Variables - Quick Setup

## ⚡ Copy & Paste ke Coolify

### WAJIB - Minimal Configuration

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=GENERATE_THIS_FIRST
APP_DEBUG=false
APP_URL=https://laravel.aito.my.id
```

**IMPORTANT:** Generate APP_KEY dulu!

```bash
# Di lokal, jalankan:
php artisan key:generate --show

# Copy output (termasuk "base64:") ke APP_KEY
```

---

## Database Configuration

### Option 1: MySQL (Recommended untuk Production)

```env
DB_CONNECTION=mysql
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=your-secure-password
```

**Jika database di Coolify:**

-   Buat database dulu di Coolify: **+ New** → **Database** → **MySQL**
-   Copy hostname dari database resource
-   Gunakan hostname internal (bukan public)

### Option 2: SQLite (Simple, untuk testing)

```env
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite
```

---

## Additional Settings (Optional)

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

# Filesystem
FILESYSTEM_DISK=local
```

---

## Cara Set di Coolify

1. **Buka Coolify Dashboard**
2. **Pilih aplikasi** → **laravel-test**
3. **Tab "Environment Variables"**
4. **Klik "Add Variable"** untuk setiap variable
5. **Save**
6. **Restart** atau **Redeploy**

---

## Contoh Lengkap untuk MySQL

```env
# Application
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:abcdefghijklmnopqrstuvwxyz1234567890ABCDEFG=
APP_DEBUG=false
APP_URL=https://laravel.aito.my.id

# Database
DB_CONNECTION=mysql
DB_HOST=mysql-laravel
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=SecurePassword123!

# Cache & Session
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

# Queue
QUEUE_CONNECTION=database

# Logging
LOG_CHANNEL=stack
LOG_LEVEL=error
```

---

## Verification

Setelah set environment variables, di Coolify terminal:

```bash
# Cek environment variables
php artisan env

# Test database connection
php artisan tinker
>>> DB::connection()->getPdo();
>>> exit

# Check config
php artisan config:show database
```

---

## Troubleshooting

### APP_KEY Error

```
No application encryption key has been specified
```

**Fix:** Generate dan set APP_KEY (lihat di atas)

### Database Connection Error

```
SQLSTATE[HY000] [2002] Connection refused
```

**Fix:**

-   Cek DB_HOST, DB_PORT benar
-   Pastikan database accessible dari container
-   Cek credentials

### SQLite File Not Found

```
Database file does not exist
```

**Fix:** Gunakan MySQL atau update Dockerfile untuk create SQLite file

---

**Next:** Set semua environment variables → Redeploy → Test!
