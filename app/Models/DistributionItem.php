<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DistributionItem extends Model
{
    protected $fillable = [
        'distribution_id',
        'item_name',
        'quantity',
        'unit',
    ];

    public function distribution(): BelongsTo
    {
        return $this->belongsTo(Distribution::class);
    }
}
