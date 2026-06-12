<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptTransaction extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'document_type',
        'invoice_number',
        'vendor',
        'transaction_date',
        'amount',
        'description',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(
            TransactionCategory::class,
            'category_id'
        );
    }

    public function documents()
    {
        return $this->hasMany(
            ReceiptTransactionDocument::class,
            'receipt_transaction_id'
        );
    }
}