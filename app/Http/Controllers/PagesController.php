<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $products = Product::orderby('created_at', 'DESC')
        // ->where('name', 'like', '%trà sữa%')
        ->take(8)
        ->get();
         return view('home',compact('products'));
    }
    public function contact(){
       
        return view('contact');
    }
    
}
