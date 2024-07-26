<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use Mail;

class OrderController extends Controller
{
    
        public function checkout(){
            $user=Auth::user();
            if( Cart::where('user_id', $user->id)->count()>0){
               
           
            $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
            return view('checkout', compact('user', 'cartItems'));
        }
        else{
            return redirect()->back()->with('erorr','Giỏ hàng rỗng ');
        }
        }
    public function processCheckout(Request $request)
    {
        // dd($request->payment);
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalAmount = 0;
        $allquantity=0;
        $user = User::where('email', $request->email)->first();
        foreach ($cartItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
            $allquantity+=$item->quantity;
        }

        $order = new Order();
        $order->user_id = $userId;
        $order->phonenumber = $request->phonenumber;
        $order->name= $request->fullname;
        $order->allquantity=$allquantity;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->payment = $request->payment;
        $order->total_amount = $totalAmount;
        $order->save();

        foreach ($cartItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->product->price;
            $orderItem->size = $item->size;
            $orderItem->save();
        }
        $id=$order->id;
       $order= Order::where('id',$id)->with('orderitems.product')->findOrFail($id);
        Mail::send('checkout-success', ['order' => $order], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Đơnn hàng');
        });
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('home')->with('success','Đặt hàng thàng công');
    }

    public function checkoutSuccess()
    {
        return view('checkout-success');
    }

    public function admin_order_index(){
        $orders=Order::all();
       










































































































































































































































































































































































































































































































































































































        
        return view('admin.index_order',compact('orders'));
    }
    public function order_detail_get($id){
    
           $order = Order::where('id',$id)->with('orderitems.product')->findOrFail($id);
       
       
        return view('admin.order_detail',compact('order'));
    }
    public function update_status_order(Request $request,$id){
        // dd($request->all());
        $order=Order::findOrFail($id);
            $order->status=$request->input('status');
            $order->save();
            return redirect()->route('admin_order_index')->with('success','Cập nhật thành công');
    }
}

