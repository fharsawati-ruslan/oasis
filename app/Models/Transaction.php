<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'finance_transactions';

    protected $fillable = [
        'company_id',
        'transaction_category_id',
        'transaction_date',
        'type',
        'amount',
        'description',
        'invoice_file',
        'status',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            TransactionCategory::class,
            'transaction_category_id'
        );
    }
}