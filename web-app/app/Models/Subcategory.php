<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategories_name',
        'category_id',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function maincategory()
    {
        return $this->belongsTo(Category::class);
    }
    

}
