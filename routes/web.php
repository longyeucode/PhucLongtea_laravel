<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/',[PagesController::class, 'index'] )->name('home');
    Route::get('contact',[PagesController::class, 'contact'] );
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
        Route::get('/checkout/success', [OrderController::class, 'checkoutSuccess'])->name('checkout.success');
    });
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'Post_login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('register', [UserController::class, 'register']);
Route::post('register',[UserController::class, 'Post_Register']);
Route::get('forgotpass_email',[UserController::class,'forgotpass_email']);
Route::post('forgotpass_email',[UserController::class,'sendVerificationCode']);
Route::get('forgotpass_code',[UserController::class,'forgotpass_code'])->name('forgotpass_code');
Route::post('forgotpass_code',[UserController::class,'verifyCode']);
Route::get('forgotpass_pass',[UserController::class,'forgotpass_pass'])->name('forgotpass_pass');
Route::post('forgotpass_pass',[UserController::class,'resetPassword']);

Route::prefix('user')->group(function () {
    Route::put('update_user',[UserController::class,'update_user'])->name('update_user');
});

//admin
   Route::get('logon', [AdminController::class,'logon'])->name('logon');
   Route::post('logon', [AdminController::class,'login_logon']);
   Route::get('logout_logon', [AdminController::class,'logout_logon']);

Route::prefix('admin')->middleware('admin')->group(function () {
   Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
   Route::get('category', [CategoryController::class,'index'])->name('index_category');
   Route::get('create_category', [CategoryController::class,'create'])->name('create_category');
   Route::post('create_category', [CategoryController::class,'store']);
   Route::get('edit_category/{id}', [CategoryController::class,'edit']);
   Route::put('edit_category/{id}', [CategoryController::class,'update']);
   Route::delete('category/{id}', [CategoryController::class,'destroy'])->name('delete_category');

//product
   Route::get('product', [ProductController::class,'show'])->name('index_product');
   Route::post('product', [ProductController::class,'show']);
   Route::get('create_product', [ProductController::class,'create']);
   Route::post('create_product', [ProductController::class,'store']);// up sản phẩm 
   Route::get('edit_product/{id}', [ProductController::class,'edit']);
   Route::put('edit_product/{id}', [ProductController::class,'update']);
   Route::delete('product/{id}', [ProductController::class,'destroy'])->name('delete_product');

   //order
   Route::get('admin_order_index', [OrderController::class,'admin_order_index'])->name('admin_order_index');
   Route::get('order_detail_get/{id}', [OrderController::class,'order_detail_get'])->name('order_detail_get');
   Route::put('update_status_order/{id}', [OrderController::class,'update_status_order'])->name('update_status_order');
});
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{category_id}', [ProductController::class, 'productbycategory']);
    Route::post('/', [ProductController::class, 'index']);
    Route::post('/{category_id}', [ProductController::class, 'index']);
    Route::get('/detail/{slug}/{category_id}', [ProductController::class, 'Product_Detail']);
    Route::get('/add_favorite_products/{id}',[ProductController::class,'add_favorite_products'])->name('add_favorite_products');
   
    
});
Route::get('/get_favorite_products',[ProductController::class,'get_favorite_products'])->name('get_favorite_products');
Route::delete('/delete_favorite_products/{id}',[ProductController::class,'delete_favorite_products'])->name('delete_favorite_products');
Route::get('/huydonhang/{id}',[ProductController::class,'huydonhang'])->name('huydonhang');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/add_to_cart/{id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::delete('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::post('/increase_cart/{id}', [CartController::class, 'increase_cart'])->name('increase_cart');
    Route::post('/decrease_cart/{id}', [CartController::class, 'decrease_cart'])->name('decrease_cart');

});
//comment

Route::get('post_comment/{slug}', [CommentController::class,'post_comment'])->name('post_comment');


