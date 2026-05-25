<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlantProgress extends Model
{
    protected $table = 'plant_progresses';

    protected $fillable = [
        'nama_mitra',
        'alamat',
        'luas_ha',
        'tanggal_tanam',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(PlantProgressDetail::class);
    }
}