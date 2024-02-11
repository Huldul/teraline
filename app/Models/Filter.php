<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(FilterCategory::class, 'filter_category_id');
    }
}
