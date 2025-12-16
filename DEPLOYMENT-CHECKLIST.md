# Pre-Deployment Checklist

Gunakan checklist ini untuk memastikan aplikasi siap di-deploy ke Coolify.

## ✅ Repository & Git

-   [ ] Semua perubahan sudah di-commit
-   [ ] Repository sudah di-push ke Git (GitHub/GitLab/Bitbucket)
-   [ ] Branch yang akan di-deploy sudah benar (main/master)
-   [ ] `.gitignore` sudah dikonfigurasi dengan benar

## ✅ Docker Configuration

-   [ ] `Dockerfile` ada di root project
-   [ ] `docker-compose.yml` ada (untuk testing lokal)
-   [ ] `.dockerignore` sudah dikonfigurasi
-   [ ] File konfigurasi di folder `docker/`:
    -   [ ] `docker/nginx/default.conf`
    -   [ ] `docker/supervisor/supervisord.conf`
    -   [ ] `docker/entrypoint.sh`

## ✅ Environment Variables

-   [ ] `APP_KEY` sudah di-generate (`php artisan key:generate --show`)
-   [ ] `APP_ENV` set ke `production`
-   [ ] `APP_DEBUG` set ke `false`
-   [ ] `APP_URL` sesuai dengan domain yang akan digunakan
-   [ ] Database credentials sudah disiapkan:
    -   [ ] `DB_HOST`
    -   [ ] `DB_PORT`
    -   [ ] `DB_DATABASE`
    -   [ ] `DB_USERNAME`
    -   [ ] `DB_PASSWORD`

## ✅ Database

-   [ ] Database sudah dibuat di VPS/Coolify
-   [ ] Database credentials sudah benar
-   [ ] Migration files sudah siap
-   [ ] Seeder (jika ada) sudah siap

## ✅ Dependencies

-   [ ] `composer.json` up to date
-   [ ] `package.json` up to date
-   [ ] Tidak ada dependencies yang conflict
-   [ ] Semua dependencies compatible dengan PHP 8.2

## ✅ Assets & Frontend

-   [ ] Livewire sudah terinstall dan dikonfigurasi
-   [ ] Assets sudah di-build (`npm run build`)
-   [ ] Vite/Mix configuration sudah benar
-   [ ] Public assets ada di folder `public/`

## ✅ Storage & Permissions

-   [ ] Folder `storage/` ada dan struktur lengkap
-   [ ] Folder `bootstrap/cache/` ada
-   [ ] `.gitignore` tidak mengabaikan struktur folder storage

## ✅ Configuration Files

-   [ ] `config/app.php` sudah dikonfigurasi
-   [ ] `config/database.php` sudah dikonfigurasi
-   [ ] `config/livewire.php` sudah dikonfigurasi (jika ada)
-   [ ] Tidak ada hardcoded credentials di config files

## ✅ Security

-   [ ] `APP_DEBUG=false` di production
-   [ ] Sensitive data tidak di-commit ke Git
-   [ ] `.env` ada di `.gitignore`
-   [ ] CORS configuration (jika diperlukan)
-   [ ] Rate limiting dikonfigurasi

## ✅ Coolify Setup

-   [ ] VPS dengan Coolify sudah siap
-   [ ] Akses ke Coolify dashboard
-   [ ] Domain sudah disiapkan (opsional)
-   [ ] SSL certificate akan di-handle oleh Coolify

## ✅ Testing

-   [ ] Aplikasi berjalan di local
-   [ ] Docker build berhasil di local (`docker build -t test .`)
-   [ ] Docker compose berjalan (`docker-compose up -d`)
-   [ ] Livewire components berfungsi
-   [ ] Database connection berhasil

## ✅ Documentation

-   [ ] README.md sudah update
-   [ ] DEPLOYMENT.md sudah dibaca
-   [ ] Workflow `/deploy-to-coolify` sudah dipahami

## ✅ Post-Deployment Plan

-   [ ] Rencana untuk run migration
-   [ ] Rencana untuk setup storage link
-   [ ] Monitoring plan
-   [ ] Backup strategy

## 🚀 Ready to Deploy!

Jika semua checklist sudah ✅, Anda siap untuk deploy!

### Next Steps:

1. **Push to Repository**

    ```bash
    git add .
    git commit -m "Ready for Coolify deployment"
    git push origin main
    ```

2. **Deploy di Coolify**

    - Login ke Coolify dashboard
    - Follow steps di `DEPLOYMENT.md`
    - Monitor build logs
    - Test aplikasi setelah deploy

3. **Post-Deployment**
    ```bash
    # Di Coolify terminal
    php artisan migrate --force
    php artisan storage:link
    php artisan config:cache
    ```

## Troubleshooting

Jika ada masalah:

1. Cek logs di Coolify dashboard
2. Review `DEPLOYMENT.md` troubleshooting section
3. Test Docker build di local
4. Verify environment variables

---

**Good luck with your deployment! 🎉**
