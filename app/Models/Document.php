<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function company()
{
    return $this->belongsTo(Company::class);
}

public function category()
{
    return $this->belongsTo(DocumentCategory::class);
}
}
