<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RealizationDocument extends Model
{
    protected $table = 'realization_documents';

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

    protected $casts = [
        'document_date' => 'date',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            DocumentCategory::class,
            'document_category_id'
        );
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'gray',
            'review' => 'warning',
            'approved' => 'success',
            'archived' => 'danger',
            default => 'gray',
        };
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path
            ? asset('storage/' . $this->file_path)
            : null;
    }
}