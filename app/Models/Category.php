<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        // hasMany связывает эту модель с моделью Product
        return $this->hasMany(Product::class);
    }
    public static function boot(){
        parent::boot();
    
        self::creating(function($model){
            $slug = Str::slug($model->name);
            // Check if a worker with the same slug already exists
            $model->slug = Category::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    
        self::updating(function($model){
            $slug = Str::slug($model->name);
            // Ensure the new slug is unique except for the current model
            // Replace 'url' with 'slug' and check against the model's existing slug
            $model->slug = Category::where('slug', $slug)->where('id', '!=', $model->id)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
    
}
