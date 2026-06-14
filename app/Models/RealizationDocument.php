<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealizationDocument extends Model
{
    protected $fillable = [
        'company_id',
        'document_category_id',
        'document_number',
        'title',
        'document_date',
        'file_path',
        'description',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id');
    }
}