<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

   protected $fillable =[
    'name',
   'price',
   'image',
   'quantity',
   'sale_price',
   'description',
   'slug',
   'category_id',
];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function favorites()
{
    return $this->belongsToMany(Product::class, 'favorite_products');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
}
