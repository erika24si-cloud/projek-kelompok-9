# Instruksi Perbaikan Production Server

## Cara 1: Via Browser (Paling Mudah)

1. **Upload file `production_fix.php` ke root folder project di alwaysdata.net**
   - Buka File Manager di alwaysdata.net
   - Upload file `production_fix.php` ke folder root project (folder yang sama dengan `app`, `public`, dll)

2. **Akses via browser:**
   ```
   https://erika-sie.alwaysdata.net/production_fix.php
   ```

3. **Script akan otomatis:**
   - Memperbaiki file model jika perlu
   - Clear semua cache Laravel
   - Verifikasi hasil

4. **Setelah selesai, HAPUS file `production_fix.php` untuk keamanan!**

---

## Cara 2: Via SSH (Jika punya akses SSH)

1. **SSH ke server alwaysdata.net:**
   ```bash
   ssh username@ssh-username.alwaysdata.net
   ```

2. **Masuk ke folder project:**
   ```bash
   cd www/projek-kelompok-9  # atau nama folder project Anda
   ```

3. **Pull latest code:**
   ```bash
   git pull origin syahrul
   ```

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   php artisan optimize:clear
   ```

5. **Verifikasi file model:**
   ```bash
   cat app/Models/kategoriAset.php | grep "protected \$table"
   ```
   Harus muncul: `protected $table = 'kategori_aset';`

---

## Cara 3: Manual Edit (Jika tidak bisa upload/SSH)

1. **Buka File Manager di alwaysdata.net**

2. **Edit file: `app/Models/kategoriAset.php`**
   - Cari baris: `protected $table = 'kategoriAset';`
   - Ubah menjadi: `protected $table = 'kategori_aset';`
   - Simpan

3. **Clear cache via SSH atau minta admin clear cache**

---

## Verifikasi Setelah Perbaikan

1. Buka: `https://erika-sie.alwaysdata.net/dashboard`
2. Buka: `https://erika-sie.alwaysdata.net/kategoriAset`
3. Buka: `https://erika-sie.alwaysdata.net/aset`

Semua harus bisa diakses tanpa error!

