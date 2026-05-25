<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlantProgressDetail extends Model
{
    protected $table = 'plant_progress_details';

    protected $fillable = [
        'plant_progress_id',
        'hari',
        'kategori',
        'kondisi',
        'keterangan',
        'gambar',
        'tanggal',
    ];

    public function progress(): BelongsTo
    {
        return $this->belongsTo(PlantProgress::class);
    }
}