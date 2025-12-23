<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table      = 'aset';
    protected $primaryKey = 'aset_id';
    protected $fillable   = ['kategori_id', 
    'kode_aset', 
    'nama_aset', 
    'tgl_perolehan', 
    'nilai_perolehan', 
    'kondisi',
    'media',
];

    public function kategori() 
    {
        return $this->belongsTo(kategoriAset::class, 'kategori_id', 'kategori_id');
    }
}

