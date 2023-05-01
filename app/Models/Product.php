<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'name',
        'price',
        'stock',
        'deskripsi',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'unique_id', 'product_unique_id');
    }
}
