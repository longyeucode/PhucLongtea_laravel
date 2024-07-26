<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
   

    public function add_to_cart( Request $request, $id){
        // dd($request->all());
        $product = Product::findOrFail($id); // lấy ra id sản phẩm thêm vào
        $quantity = $request->input('quantity',1); // số lượng mặc định là 1
        $size=$request->input('size');
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->where('size', $size)
            ->first();

       if ($cart) {
        // Nếu mục giỏ hàng đã tồn tại, cập nhật số lượng
       $cart->quantity += $quantity;
      $cart->save();
    } else {
    // Nếu mục giỏ hàng chưa tồn tại, tạo mới
          Cart::create([
     'user_id' => Auth::id(),
     'product_id' => $id,
     'size' => $size,
     'quantity' => $quantity,
          ]);
         }
        }
         else {
            // Nếu chưa đăng nhập lưu vào session
            $sessionId = $request->session()->getId();
            $cart = Cart::where('session_id',$sessionId)
            ->where('product_id', $id)
            ->where('size', $size)
            ->first();

       if ($cart) {
        // Nếu mục giỏ hàng đã tồn tại, cập nhật số lượng
       $cart->quantity += $quantity;
      $cart->save();
    } else {
    // Nếu mục giỏ hàng chưa tồn tại, tạo mới
          Cart::create([
     'session_id' => $sessionId,
     'product_id' => $id,
     'size' => $size,
     'quantity' => $quantity,
          ]);
         }
        }

         return redirect()->back()->with('success','thêm giỏ hàng thàng công');
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->with('product')->get();
        } else {
            $sessionId = $request->session()->getId();
            $cart = Cart::where('session_id', $sessionId)->with('product')->get();
        }

        return view('cart', compact('cart'));
    }


public function delete_cart($id){
    
     try {
    $cart= Cart::findOrFail($id);
    $cart->delete();
    return  redirect()->route('cart')->with('success','Đã xóa thành công');
 } catch (\Throwable $th) {
     return redirect()->route('cart')->with('erorr','Xóa không thành công');
 }
}
public function increase_cart($id){
    
    $cart = Cart::where('id',$id)->where('user_id',Auth::id())->first();
    if($cart){
        $cart->quantity += 1;
        $cart->save();
    }
    
    return redirect()->back();
}
public function decrease_cart($id){
    
    $cart = Cart::where('id',$id)->where('user_id',Auth::id())->first();
    if($cart&&$cart->quantity>1){
        $cart->quantity -= 1;
        $cart->save();
    }
    else{
        return redirect()->route('cart')->with('erorr','Sản phẩm không thể ít hơn 1');
    }
    
    return redirect()->back();
}

public function totalAmount()
{
    $totalAmount = 0;
    $cartItems = Cart::where('user_id', Auth::id())->get();

    foreach ($cartItems as $item) {
        $totalAmount += $item->product->price * $item->quantity;
    }

    return $totalAmount;
}
public function showTotalAmount()
{
    $totalAmount = $this->totalAmount();
    return $totalAmount;
}
}

    


