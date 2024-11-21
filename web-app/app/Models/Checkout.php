<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'email',
        'first_name',
        'last_name', 
        'address',
        'country',
        'state',
        'city',
        'zip',
        'phone',
        'company',
        'user_id',
        'status',
        'order_no'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order::class);
    }
}
