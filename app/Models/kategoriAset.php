<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategoriAset extends Model
{
    protected $table = 'kategoriAset';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama', 'kode', 'deskripsi'];
}
