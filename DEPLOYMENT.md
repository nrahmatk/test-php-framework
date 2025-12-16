# Laravel Coolify Deployment

Dockerfile dan konfigurasi untuk deploy aplikasi Laravel di Coolify self-hosted.

## 📦 File yang Dibuat

1. **Dockerfile** - Multi-stage build untuk optimasi image size
2. **.dockerignore** - Exclude file yang tidak perlu
3. **docker/nginx/default.conf** - Konfigurasi Nginx
4. **docker/supervisor/supervisord.conf** - Manage multiple processes
5. **docker/entrypoint.sh** - Setup script saat container start
6. **docker-compose.yml** - Untuk testing lokal (opsional)

## 🚀 Cara Deploy di Coolify

### 1. Setup di Coolify

1. Login ke Coolify dashboard
2. Buat project baru atau pilih project yang sudah ada
3. Pilih **"New Resource"** → **"Application"**
4. Pilih source: **Git Repository** atau **GitHub App**
5. Connect repository Anda

### 2. Konfigurasi Build

Di Coolify, set konfigurasi berikut:

**Build Pack:** `Dockerfile`

**Port:** `80`

**Health Check Path:** `/health`

### 3. Environment Variables

Set environment variables di Coolify (Settings → Environment):

```bash
# Application
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:your-app-key-here
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database (gunakan database dari Coolify)
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password

# Cache & Queue
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

# Redis (gunakan Redis dari Coolify)
REDIS_HOST=your-redis-host
REDIS_PASSWORD=null
REDIS_PORT=6379

# Optional: Auto-run migrations
RUN_MIGRATIONS=true
```

### 4. Persistent Storage (Optional)

Jika Anda ingin storage tetap persisten:

1. Di Coolify, buka **Storage** tab
2. Add volume: `/var/www/html/storage` → mount ke path yang sama

### 5. Deploy

1. Klik **"Deploy"** di Coolify
2. Monitor build logs
3. Setelah selesai, aplikasi akan running di URL yang diberikan

## 🧪 Testing Lokal

Sebelum deploy ke Coolify, test dulu di lokal:

```bash
# Build image
docker build -t laravel-app .

# Run dengan docker-compose
docker-compose up -d

# Check logs
docker-compose logs -f app

# Access aplikasi
# http://localhost
```

## 📋 Checklist Sebelum Deploy

-   [ ] `.env` sudah dikonfigurasi dengan benar
-   [ ] `APP_KEY` sudah di-generate (`php artisan key:generate`)
-   [ ] Database credentials sudah benar
-   [ ] Redis connection sudah dikonfigurasi
-   [ ] File permissions sudah benar untuk `storage` dan `bootstrap/cache`
-   [ ] Assets sudah di-build (`npm run build`)

## 🔧 Troubleshooting

### Container tidak start

```bash
# Check logs di Coolify
# Atau jika testing lokal:
docker logs laravel-app
```

### Permission denied di storage

```bash
# Masuk ke container
docker exec -it laravel-app sh

# Fix permissions
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage
```

### Database connection failed

-   Pastikan DB_HOST mengarah ke service database yang benar
-   Check database credentials
-   Pastikan database sudah dibuat

### Queue tidak jalan

-   Check supervisor logs: `docker exec -it laravel-app supervisorctl status`
-   Restart queue worker: `docker exec -it laravel-app supervisorctl restart laravel-queue:*`

## 🎯 Fitur

✅ Multi-stage build untuk image size yang kecil  
✅ PHP 8.2 dengan FPM  
✅ Nginx sebagai web server  
✅ Supervisor untuk manage multiple processes  
✅ Queue workers (2 processes)  
✅ Laravel scheduler  
✅ Health check endpoint  
✅ Optimized untuk production  
✅ Gzip compression  
✅ Security headers  
✅ Redis support  
✅ Auto-migration (optional)

## 📝 Notes

-   Image size: ~150-200MB (tergantung dependencies)
-   Queue workers: 2 processes (bisa disesuaikan di supervisord.conf)
-   Health check: `/health` endpoint
-   Logs: Available di Coolify dashboard atau via `docker logs`

## 🔒 Security

-   PHP production mode
-   Security headers enabled
-   Hidden files denied
-   X-Powered-By header removed
-   Proper file permissions

## 📚 Resources

-   [Coolify Documentation](https://coolify.io/docs)
-   [Laravel Deployment](https://laravel.com/docs/deployment)
-   [Docker Best Practices](https://docs.docker.com/develop/dev-best-practices/)
