<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'tanggal' => 'date',
        'biaya' => 'float',
    ];

    public function aset(): BelongsTo
    {
        return $this->belongsTo(aset::class, 'aset_id', 'aset_id');
    }
}
