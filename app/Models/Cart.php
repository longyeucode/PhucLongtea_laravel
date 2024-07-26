<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','size', 'session_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function totalQuantity()
    {
        if(Auth::check()){
        return self::where('user_id', Auth::id())->sum('quantity');
        }
        return self::where('session_id', Session::getId())->sum('quantity');
    }
    public static function totalPrice()
    {
        if(Auth::check()){
        return self::where('user_id', Auth::id())->sum('price');
        }
        return self::where('session_id', Session::getId())->sum('price');
    }
   
}
