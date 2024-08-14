<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function post_comment(Request $request, $slug){
        if(Auth::check()){
            $product= Product::where('slug',$slug)->first();
            $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->product_id=$product->id;
            $comment->fill($request->except('_token', '_method'));
            $comment->save();
            return redirect()->back()->with('success', 'Đăng bình luận thành công, cảm ơn bạn đã góp ý cho sản phẩm chúng tôi');
        
        }
        else{
            return redirect()->route('login')->with('success','vui lòng đăng nhập để đánh giá');
        }
        }
    
}

