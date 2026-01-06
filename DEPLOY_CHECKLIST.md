# Checklist Deploy - Perbaikan Tabel kategori_aset

## File yang Perlu Di-Deploy

### 1. Models (PENTING!)
- ✅ `app/Models/kategoriAset.php` - Pastikan line 9: `protected $table = 'kategori_aset';`
- ✅ `app/Models/aset.php` - Sudah benar (relationship menggunakan kategoriAset class)

### 2. Migrations
- ✅ `database/migrations/2025_11_11_024634_create_kategori_aset_table.php`
- ✅ `database/migrations/2025_11_12_005548_create_aset_table.php`

### 3. Controllers (Opsional, sudah benar)
- ✅ `app/Http/Controllers/kategoriAsetController.php`
- ✅ `app/Http/Controllers/AsetController.php`

### 4. Views (Opsional, sudah benar)
- ✅ `resources/views/kategori_aset/index.blade.php`
- ✅ `resources/views/aset/index.blade.php`

## Langkah Deploy

1. **Commit semua perubahan ke Git:**
   ```bash
   git add .
   git commit -m "Fix: Update kategoriAset model to use kategori_aset table"
   git push
   ```

2. **Di Production Server (alwaysdata.net):**
   - Pull latest code:
     ```bash
     git pull origin main  # atau branch yang digunakan
     ```
   
   - Clear cache:
     ```bash
     php artisan config:clear
     php artisan cache:clear
     php artisan route:clear
     php artisan view:clear
     php artisan optimize:clear
     ```

3. **Verifikasi:**
   - Cek file `app/Models/kategoriAset.php` di production
   - Pastikan line 9: `protected $table = 'kategori_aset';`
   - Test akses dashboard, kategori aset, dan aset

## Catatan Penting

- ✅ Database di production sudah menggunakan tabel `kategori_aset` (snake_case)
- ✅ Kode lokal sudah diperbaiki untuk menggunakan `kategori_aset`
- ⚠️ Pastikan semua file di-deploy, terutama Models!

## Troubleshooting

Jika masih error setelah deploy:
1. Pastikan file `app/Models/kategoriAset.php` di production sudah benar
2. Jalankan `php artisan optimize:clear` di production
3. Restart web server jika perlu

