# 🚀 Quick Deployment Guide - Coolify

## TL;DR - Deploy dalam 5 Langkah

### 1️⃣ Generate APP_KEY

```bash
php artisan key:generate --show
```

Copy output untuk digunakan di Coolify.

### 2️⃣ Push ke Git

```bash
git add .
git commit -m "Ready for Coolify deployment"
git push origin main
```

### 3️⃣ Setup di Coolify

1. Login → **+ New** → **Application**
2. Pilih repository Anda
3. Build Pack: **Dockerfile**
4. Branch: **main**

### 4️⃣ Environment Variables (Minimal)

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5️⃣ Deploy!

Klik **Deploy** dan tunggu hingga selesai.

---

## 📋 Post-Deployment Commands

Setelah deploy berhasil, jalankan di Coolify terminal:

```bash
# Run migrations
php artisan migrate --force

# Create storage link
php artisan storage:link

# Cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🧪 Test Lokal Dulu

Sebelum deploy, test Docker di lokal:

```bash
# Build image
docker build -t laravel-app .

# Run dengan docker-compose
docker-compose up -d

# Akses di http://localhost:8080
```

---

## 🔧 Common Issues

### Build Gagal

```bash
# Cek syntax Dockerfile
docker build -t test .
```

### Permission Error

```bash
chmod -R 775 storage bootstrap/cache
```

### Database Connection Error

-   Cek DB credentials di environment variables
-   Pastikan DB host accessible dari container

### Livewire Tidak Berfungsi

```bash
npm run build
php artisan view:clear
```

---

## 📚 Dokumentasi Lengkap

-   **Lengkap**: [DEPLOYMENT.md](DEPLOYMENT.md)
-   **Checklist**: [DEPLOYMENT-CHECKLIST.md](DEPLOYMENT-CHECKLIST.md)
-   **Workflow**: `.agent/workflows/deploy-to-coolify.md`

---

## 🆘 Need Help?

1. Cek Coolify logs
2. Review dokumentasi di atas
3. Test Docker build di lokal
4. Verify environment variables

---

**Happy Deploying! 🎉**
