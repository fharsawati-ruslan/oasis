<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'company_code',
        'company_name',
        'director',
        'phone',
        'email',
        'address',
        'is_active',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}