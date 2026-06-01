<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribution extends Model
{
    protected $fillable = [
        'distribution_date',
        'bast_number',
        'block_name',
        'notes',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(DistributionItem::class);
    }
}
