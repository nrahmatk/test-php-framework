# Fix: Port Configuration Mismatch (502 Error)

## Problem

-   Coolify configured untuk port **3000**
-   Dockerfile & Nginx configured untuk port **80**
-   Mismatch ini menyebabkan 502 Bad Gateway

## Solution Applied ✅

### Updated Files:

1. **`docker/nginx/default.conf`**

    - Changed: `listen 80` → `listen 3000`
    - Changed: `listen [::]:80` → `listen [::]:3000`

2. **`Dockerfile`**
    - Changed: `EXPOSE 80` → `EXPOSE 3000`

## Coolify Configuration

Pastikan di Coolify settings:

-   **Ports Exposes**: `3000` ✅
-   **Ports Mappings**: `3000:3000` atau kosongkan (auto)

## Next Steps

1. **Commit & Push:**

    ```bash
    git add .
    git commit -m "Fix: Update port configuration to 3000"
    git push origin main
    ```

2. **Redeploy di Coolify:**

    - Klik "Redeploy"
    - Tunggu build selesai
    - Test aplikasi

3. **Verify:**
    - Akses https://laravel.aito.my.id
    - Seharusnya tidak ada 502 error lagi

## Alternative Solution

Jika ingin pakai port 80 (standard HTTP):

1. Di Coolify, ubah:

    - **Ports Exposes**: `80`
    - **Ports Mappings**: kosongkan atau `80`

2. Revert changes:

    ```bash
    git revert HEAD
    git push
    ```

3. Redeploy

---

**Status**: ✅ Port configuration fixed to 3000
