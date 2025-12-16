# Deploy Laravel Livewire ke VPS via Coolify

## Persiapan

### 1. Pastikan VPS dan Coolify Sudah Siap

-   VPS sudah terinstall Coolify
-   Akses ke Coolify dashboard
-   Domain sudah disiapkan (opsional)

### 2. Persiapan Repository

Pastikan project sudah di-push ke Git repository (GitHub, GitLab, atau Bitbucket).

```bash
git add .
git commit -m "Add Docker configuration for Coolify deployment"
git push origin main
```

## Langkah Deploy di Coolify

### 1. Login ke Coolify Dashboard

Akses Coolify dashboard Anda di browser.

### 2. Buat Project Baru

1. Klik **"+ New"** atau **"Create New Resource"**
2. Pilih **"Application"**
3. Pilih **"Public Repository"** atau **"Private Repository"** (jika repo private)

### 3. Konfigurasi Repository

1. **Repository URL**: Masukkan URL Git repository Anda
    - Contoh: `https://github.com/username/test-php-framework.git`
2. **Branch**: Pilih branch yang akan di-deploy (biasanya `main` atau `master`)
3. **Build Pack**: Pilih **"Dockerfile"**

### 4. Konfigurasi Environment Variables

Tambahkan environment variables yang diperlukan:

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

**Catatan Penting:**

-   Generate `APP_KEY` baru dengan: `php artisan key:generate --show`
-   Sesuaikan database credentials dengan database Anda

### 5. Konfigurasi Port

-   **Port**: 80 (sudah dikonfigurasi di Dockerfile)
-   Coolify akan otomatis handle SSL/HTTPS jika domain sudah dikonfigurasi

### 6. Konfigurasi Domain (Opsional)

1. Di tab **"Domains"**, tambahkan domain Anda
2. Coolify akan otomatis setup SSL certificate via Let's Encrypt

### 7. Deploy Application

1. Klik **"Deploy"** atau **"Start Deployment"**
2. Tunggu proses build dan deployment selesai
3. Monitor logs untuk memastikan tidak ada error

## Post-Deployment

### 1. Jalankan Migrasi Database

Jika perlu menjalankan migrasi, Anda bisa:

1. Akses terminal di Coolify
2. Jalankan: `php artisan migrate --force`

Atau uncomment baris migrasi di `docker/entrypoint.sh`:

```bash
# php artisan migrate --force
```

### 2. Setup Storage Link

Jika menggunakan storage public:

```bash
php artisan storage:link
```

### 3. Clear Cache (Jika Diperlukan)

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Troubleshooting

### Build Gagal

1. Cek logs di Coolify dashboard
2. Pastikan semua dependencies di `composer.json` dan `package.json` benar
3. Pastikan `APP_KEY` sudah di-set di environment variables

### Permission Error

Jika ada error permission di storage atau cache:

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Database Connection Error

1. Pastikan database credentials benar
2. Pastikan database host bisa diakses dari container
3. Cek firewall rules

### Livewire Tidak Berfungsi

1. Pastikan assets sudah di-build: `npm run build`
2. Clear cache: `php artisan view:clear`
3. Pastikan `APP_URL` sesuai dengan domain yang digunakan

## Update Aplikasi

Untuk update aplikasi setelah ada perubahan code:

1. Push perubahan ke Git repository:

```bash
git add .
git commit -m "Update application"
git push origin main
```

2. Di Coolify dashboard, klik **"Redeploy"** atau setup **Auto Deploy** untuk otomatis deploy saat ada push ke repository

## Monitoring

Coolify menyediakan:

-   **Logs**: Real-time application logs
-   **Metrics**: CPU, Memory, Network usage
-   **Health Checks**: Automatic health monitoring

## Backup

Jangan lupa setup backup untuk:

1. Database (gunakan fitur backup di Coolify atau setup cron job)
2. Storage files (jika ada upload files)

## Tips Optimasi

1. **Enable OPcache**: Sudah included di PHP-FPM
2. **Use Redis/Memcached**: Untuk cache dan session (optional)
3. **CDN**: Untuk static assets (optional)
4. **Queue Workers**: Sudah dikonfigurasi di supervisor untuk background jobs

## Keamanan

1. Pastikan `APP_DEBUG=false` di production
2. Setup firewall di VPS
3. Gunakan HTTPS (Coolify handle otomatis dengan Let's Encrypt)
4. Update dependencies secara berkala
5. Setup monitoring dan alerts

## Support

Jika ada masalah:

1. Cek Coolify documentation: https://coolify.io/docs
2. Cek Laravel documentation: https://laravel.com/docs
3. Cek logs di Coolify dashboard
