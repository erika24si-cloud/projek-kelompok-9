<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mutasiAset extends Model
{
    protected $table = 'mutasi_aset';
    protected $primaryKey = 'mutasi_id';
    protected $keyType = 'int';
    protected $fillable = [
        'aset_id',
        'tanggal',
        'jenis_mutasi',
        'keterangan',
    ];
}
