<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptTransactionDocument extends Model
{
    protected $fillable = [
        'receipt_transaction_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function receiptTransaction()
    {
        return $this->belongsTo(
            ReceiptTransaction::class,
            'receipt_transaction_id'
        );
    }
}