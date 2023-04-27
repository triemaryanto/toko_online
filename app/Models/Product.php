<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'deskripsi',
        'image',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
