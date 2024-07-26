<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    protected $table = 'favorite_products';

    // Add the attributes that are mass assignable.
    protected $fillable = ['products_id', 'users_id'];

    // Disable timestamps if not used
    public $timestamps = false;

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorite_products');
    }
}
