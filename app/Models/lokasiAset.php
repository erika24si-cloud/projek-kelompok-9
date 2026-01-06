<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class lokasiAset extends Model
{
    protected $table = 'lokasi_aset';
    protected $primaryKey = 'lokasi_id';
    protected $keyType = 'int';
    protected $fillable = [
        'aset_id',
        'keterangan',
        'lokasi_text',
        'rt',
        'rw',
        'media'
    ];

    public function aset(): BelongsTo
    {
        return $this->belongsTo(aset::class, 'aset_id', 'aset_id');
    }
}
