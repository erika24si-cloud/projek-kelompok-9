<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemeliharaanAset extends Model
{
    protected $table = 'pemeliharaan_aset';
    protected $primaryKey = 'pemeliharaan_id';
    protected $keyType = 'int';
    protected $fillable = [
        'aset_id',
        'tanggal',
        'tindakan',
        'biaya',
        'pelaksana',
         'media'
    ];
    
    protected $casts = [
        'tanggal' => 'date', // PERBAIKAN PENTING DI SINI!
        'biaya' => 'float',
    ];
}
