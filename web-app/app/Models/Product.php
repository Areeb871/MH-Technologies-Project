<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_name',
        'product_model',
        'product_description',
        'product_price',
        'category_id',
        'subcategory_id',
        'image',
        
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(subcategory::class);
    }
    public function carts()
    {
        return $this->hasMany(Addtocart::class);
    }
    public function orderItems()
    {
        return $this->hasMany(Order::class);
    }

}
