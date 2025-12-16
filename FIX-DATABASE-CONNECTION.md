# Quick Fix: Database Connection

## Error Saat Ini

```
SQLSTATE[HY000] [2002] Connection refused
```

Ini berarti Laravel tidak bisa connect ke MySQL database.

---

## ✅ SOLUSI TERMUDAH: Buat Database di Coolify

### Step 1: Buat MySQL Database

1. **Coolify Dashboard** → **+ New** → **Database** → **MySQL**
2. Isi form:
    ```
    Name: laravel-db
    Database Name: laravel
    Username: laravel
    Password: [buat password kuat]
    ```
3. **Create**
4. Tunggu hingga status **"Running"**

### Step 2: Copy Internal Hostname

Setelah database running, Coolify akan show connection details.

**PENTING:** Copy **Internal Hostname** (bukan public hostname!)

Contoh: `laravel-db` atau `mysql-xxxxx.coolify.internal`

### Step 3: Update Environment Variables

Di aplikasi **laravel-test** → **Environment Variables**:

```env
DB_CONNECTION=mysql
DB_HOST=laravel-db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=your-password-here
```

**Ganti:**

-   `DB_HOST`: Internal hostname dari Step 2
-   `DB_PASSWORD`: Password yang Anda buat di Step 1

### Step 4: Save & Restart

1. **Save** environment variables
2. **Restart** aplikasi

### Step 5: Run Migrations

Di Coolify Terminal (aplikasi laravel-test):

```bash
php artisan migrate --force
```

**DONE!** ✅

---

## 🔄 ALTERNATIF: Gunakan SQLite (Lebih Mudah untuk Testing)

Jika hanya untuk testing/demo, gunakan SQLite (tidak perlu database server):

### Step 1: Update Environment Variables

Di Coolify, **hapus semua** `DB_*` variables, lalu set:

```env
DB_CONNECTION=sqlite
```

### Step 2: Commit & Push Perubahan

Saya sudah update Dockerfile untuk support SQLite:

```bash
git add .
git commit -m "Add SQLite support"
git push origin test
```

### Step 3: Redeploy

Di Coolify, klik **"Redeploy"**

### Step 4: Run Migrations

Di Coolify Terminal:

```bash
php artisan migrate --force
```

**DONE!** ✅

---

## 📊 Perbandingan

| Feature             | MySQL di Coolify             | SQLite              |
| ------------------- | ---------------------------- | ------------------- |
| Setup               | Perlu buat database resource | Otomatis            |
| Performance         | Lebih baik untuk production  | Cukup untuk testing |
| Scalability         | Bisa scale                   | Limited             |
| Backup              | Built-in di Coolify          | Manual              |
| **Recommended for** | **Production**               | **Testing/Demo**    |

---

## 🎯 Rekomendasi

-   **Untuk Production/Live**: Gunakan **MySQL di Coolify** (Option 1)
-   **Untuk Testing/Demo**: Gunakan **SQLite** (Option 2)

---

## ❓ Troubleshooting

### Masih Connection Refused setelah set MySQL?

**Cek:**

1. Database sudah **Running** di Coolify?
2. `DB_HOST` menggunakan **Internal Hostname** (bukan IP/public hostname)?
3. `DB_PASSWORD` benar?
4. Sudah **Restart** aplikasi setelah update env vars?

**Test connection di Coolify Terminal:**

```bash
php artisan tinker
>>> DB::connection()->getPdo();
>>> exit
```

Jika berhasil, akan show PDO object. Jika error, cek credentials.

---

**Pilih salah satu option di atas dan ikuti step-by-step!** 🚀
