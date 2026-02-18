<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'composition', 'description', 'packaging', 'image', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Scope for active products
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    
    // Scope for search
    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('composition', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        return $query;
    }
    
    // Scope for category filter
    public function scopeByCategory($query, $categoryId)
    {
        if (!empty($categoryId)) {
            return $query->where('category_id', $categoryId);
        }
        return $query;
    }
}