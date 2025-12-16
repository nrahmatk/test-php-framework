# 🚀 Quick Start - Deploy ke Coolify

Panduan cepat untuk deploy NeonFlow ke Coolify dalam 5 menit.

## ⚡ Prerequisites

-   ✅ Coolify instance sudah running
-   ✅ Repository sudah di GitHub
-   ✅ Domain (opsional)

## 📝 Step-by-Step

### 1️⃣ Buat Application di Coolify

```bash
1. Login ke Coolify Dashboard
2. Click "New Resource" → "Application"
3. Select "Public Repository"
4. Paste repository URL: https://github.com/nrahmatk/test-php-framework
5. Branch: main
6. Build Pack: Dockerfile
```

### 2️⃣ Set Environment Variables

Di Coolify, tambahkan environment variables:

```env
APP_NAME=NeonFlow
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_URL=https://your-domain.com
```

**Generate APP_KEY:**

```bash
# Di local terminal:
php artisan key:generate --show
# Copy hasilnya ke Coolify
```

### 3️⃣ Configure Domain (Opsional)

```bash
1. Di Coolify, buka tab "Domains"
2. Add domain: your-domain.com
3. Enable "Generate SSL Certificate"
4. Save
```

### 4️⃣ Deploy!

```bash
1. Click "Deploy" button
2. Wait for build to complete (~3-5 minutes)
3. Check logs untuk memastikan tidak ada error
4. Access aplikasi di domain yang sudah di-set
```

## 🎯 Verify Deployment

Test aplikasi:

```bash
# Health check
curl https://your-domain.com/health

# Expected response:
# {"status":"ok","timestamp":"2024-01-01T00:00:00+00:00"}
```

## 🔄 Setup Auto-Deploy (Opsional)

### Enable CI/CD dengan GitHub Actions:

**1. Get Webhook URL:**

```bash
Coolify → Application Settings → Copy Webhook URL
```

**2. Add GitHub Secret:**

```bash
GitHub Repository → Settings → Secrets → New secret
Name: COOLIFY_WEBHOOK_URL
Value: [paste webhook URL]
```

**3. Push to trigger deploy:**

```bash
git add .
git commit -m "Enable auto-deploy"
git push origin main
```

Setiap push ke `main` akan otomatis deploy! 🎉

## 🐛 Troubleshooting

### Build Failed?

```bash
# Check logs di Coolify
# Common issues:
- Missing APP_KEY → Generate dan set di environment
- Port conflict → Ensure port 80 is exposed
- Permission error → Check Dockerfile permissions
```

### Application Not Accessible?

```bash
# 1. Check container status
# 2. View logs di Coolify
# 3. Verify domain DNS settings
# 4. Check SSL certificate status
```

### Need to Clear Cache?

```bash
# Access container shell di Coolify:
php artisan optimize:clear
```

## 📚 Next Steps

-   ✅ Setup database (jika diperlukan)
-   ✅ Configure email settings
-   ✅ Setup monitoring
-   ✅ Enable backups

## 📖 Full Documentation

Lihat [DEPLOYMENT.md](DEPLOYMENT.md) untuk dokumentasi lengkap.

---

**Happy Deploying! 🚀**

Need help? Check Coolify docs: https://coolify.io/docs
