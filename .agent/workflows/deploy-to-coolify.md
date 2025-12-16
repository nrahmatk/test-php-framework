---
description: Deploy Laravel Livewire ke Coolify
---

# Deploy Laravel Livewire ke VPS via Coolify

Workflow ini menjelaskan langkah-langkah untuk deploy aplikasi Laravel Livewire ke VPS menggunakan Coolify.

## Prerequisites

1. VPS dengan Coolify sudah terinstall
2. Akses ke Coolify dashboard
3. Git repository (GitHub/GitLab/Bitbucket)
4. Domain (opsional, tapi recommended)

## Langkah 1: Persiapan Repository

Pastikan semua file Docker sudah ada dan commit ke repository:

```bash
git add .
git commit -m "Add Docker configuration for Coolify deployment"
git push origin main
```

## Langkah 2: Setup di Coolify Dashboard

### 2.1 Buat Resource Baru

1. Login ke Coolify dashboard
2. Klik **"+ New"** atau **"Create New Resource"**
3. Pilih **"Application"**

### 2.2 Pilih Source

1. Pilih **"Public Repository"** (atau Private jika repo private)
2. Masukkan Git repository URL
3. Pilih branch yang akan di-deploy (main/master)

### 2.3 Pilih Build Pack

1. Pilih **"Dockerfile"**
2. Coolify akan otomatis detect Dockerfile di root project

## Langkah 3: Konfigurasi Environment Variables

Tambahkan environment variables berikut di Coolify:

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

**Generate APP_KEY:**

```bash
php artisan key:generate --show
```

## Langkah 4: Konfigurasi Database (Opsional)

Jika belum punya database, buat database baru di Coolify:

1. Klik **"+ New"** → **"Database"**
2. Pilih **"MySQL"** atau **"PostgreSQL"**
3. Set nama database, username, dan password
4. Copy connection details ke environment variables aplikasi

## Langkah 5: Konfigurasi Domain

1. Di tab **"Domains"**, tambahkan domain Anda
2. Coolify akan otomatis setup SSL certificate via Let's Encrypt
3. Update `APP_URL` di environment variables dengan domain Anda

## Langkah 6: Deploy

1. Klik **"Deploy"** atau **"Start Deployment"**
2. Monitor build logs untuk memastikan tidak ada error
3. Tunggu hingga status menjadi **"Running"**

## Langkah 7: Post-Deployment

### 7.1 Jalankan Migrasi (Jika Diperlukan)

Akses terminal di Coolify dan jalankan:

```bash
php artisan migrate --force
```

Atau uncomment baris ini di `docker/entrypoint.sh`:

```bash
# php artisan migrate --force
```

### 7.2 Setup Storage Link

```bash
php artisan storage:link
```

### 7.3 Verifikasi Deployment

1. Akses domain/URL aplikasi
2. Cek apakah aplikasi berjalan dengan baik
3. Test fitur Livewire

## Langkah 8: Setup Auto Deploy (Opsional)

1. Di Coolify, aktifkan **"Auto Deploy"**
2. Setiap kali ada push ke branch yang dipilih, aplikasi akan otomatis di-redeploy

## Testing Lokal Sebelum Deploy

Untuk test Docker image di lokal sebelum deploy:

```bash
# Build image
docker build -t laravel-app .

# Run dengan docker-compose
docker-compose up -d

# Akses di http://localhost:8080
```

## Troubleshooting

### Build Gagal

-   Cek logs di Coolify dashboard
-   Pastikan Dockerfile syntax benar
-   Pastikan semua dependencies ada di composer.json dan package.json

### Permission Error

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Database Connection Error

-   Cek database credentials di environment variables
-   Pastikan database host bisa diakses dari container
-   Cek firewall rules

### Livewire Tidak Berfungsi

-   Pastikan assets sudah di-build: `npm run build`
-   Clear cache: `php artisan view:clear`
-   Pastikan `APP_URL` sesuai dengan domain

## Update Aplikasi

Untuk update setelah ada perubahan:

```bash
git add .
git commit -m "Update application"
git push origin main
```

Jika auto-deploy aktif, Coolify akan otomatis redeploy. Jika tidak, klik **"Redeploy"** di dashboard.

## Monitoring & Maintenance

1. **Logs**: Monitor logs di Coolify dashboard
2. **Metrics**: Cek CPU, Memory, Network usage
3. **Health Checks**: Setup health check endpoint
4. **Backup**: Setup backup untuk database dan storage

## Keamanan

-   [ ] Set `APP_DEBUG=false` di production
-   [ ] Gunakan HTTPS (Coolify handle otomatis)
-   [ ] Setup firewall di VPS
-   [ ] Update dependencies secara berkala
-   [ ] Setup monitoring dan alerts
-   [ ] Gunakan strong passwords untuk database
-   [ ] Enable rate limiting

## Resources

-   Coolify Docs: https://coolify.io/docs
-   Laravel Docs: https://laravel.com/docs
-   Livewire Docs: https://livewire.laravel.com/docs
