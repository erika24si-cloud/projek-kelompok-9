<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class warga extends Authenticatable
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable = ['no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',];
}
