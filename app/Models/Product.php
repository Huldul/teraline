<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        // belongsTo связывает эту модель с моделью Category
        return $this->belongsTo(Category::class);
    }

    public function filters()
    {
        // belongsToMany связывает эту модель с моделью Filter через промежуточную таблицу product_filters
        return $this->belongsToMany(Filter::class, 'product_filters', 'product_id', 'filter_id');
    }

    public static function boot(){
        parent::boot();
    
        self::creating(function($model){
            $slug = Str::slug($model->name);
            $model->slug = Product::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    
        self::updating(function($model){
            $slug = Str::slug($model->name);
            $model->slug = Product::where('slug', $slug)->where('id', '!=', $model->id)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}

