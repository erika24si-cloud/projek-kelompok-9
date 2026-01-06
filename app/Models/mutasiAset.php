<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function aset(): BelongsTo
    {
        return $this->belongsTo(aset::class, 'aset_id', 'aset_id');
    }
}
