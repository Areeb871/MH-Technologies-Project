<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_name',
         // Make sure this is fillable for sub-categories
    ];
    /**
     * Relationship to get the products under this category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }   
    
}
