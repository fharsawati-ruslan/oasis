<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionCategory extends Model
{
    protected $fillable = [
        'category_name',
        'type',
        'is_active',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(
            Transaction::class,
            'transaction_category_id'
        );
    }
}