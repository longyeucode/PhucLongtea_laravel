<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PagesController extends Controller
{
    public function index(){
        $products_new = Product::orderBy('created_at', 'desc')->take(8)->get();
        $products_trasua = Product::orderby('created_at','DESC')->where('category_id',1)->take(8)->get();
        $products_tra = Product::orderby('created_at','DESC')->where('category_id', 3)->take(8)->get();
         return view('home',compact('products_trasua','products_tra','products_new'));
    }
    public function contact(){
       
        return view('contact');
    }
    
}
