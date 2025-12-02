<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table      = 'aset';
    protected $primaryKey = 'aset_id';
    protected $fillable   = ['kategori_id', 'kode_aset', 'nama_aset', 'tgl_perolehan', 'nilai_perolehan', 'kondisi'];

    public function kategori() 
    {
        // 1. App\Models\KategoriAset (Model Target)
        // 2. 'kategori_id' (Foreign Key di tabel 'aset' Anda)
        // 3. 'kategori_id' (Primary Key di tabel 'kategori_aset' target)
        return $this->belongsTo(kategoriAset::class, 'kategori_id', 'kategori_id');
    }
}

