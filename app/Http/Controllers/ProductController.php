<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\FavoriteProduct;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // dd(request()->key);
        $products= Product::orderby('created_at','DESC')->get();
        $categories = Category::all();
        if($key=request()->key){
            // dd($key);
            $products= Product::orderby('created_at','DESC')
            ->where('name','like','%'.$key.'%')->paginate(10);;
        }
        else{
            $products = Product::orderBy('created_at', 'DESC')
            ->paginate(10);
         }
      
       return view('product',compact('products','categories'));
    }   
    public function productbycategory(Request $request){
        // dd(request()->key);
        if($key=request()->key){
            // dd($key);
            $products= Product::orderby('created_at','DESC')
            ->where('name','like','%'.$key.'%')->paginate(10);;
        }
    else{
        $products = Product::where('category_id',$request->category_id)->orderby('created_at','DESC')->paginate(10);
     };
        $categories = Category::all();
        // if($key=request()->key){
        //     dd($key);
        //     $products= Product::orderby('created_at','DESC')->where('name','like','%'.$key.'%')->get();
        // }
      
       return view('product',compact('products','categories'));
    }   

    
    public function Product_Detail($slug,$category_id)
    {
        $products = Product::where('slug', $slug)->firstOrFail();
        $products_with_detail=Product::where('category_id',$category_id)->limit(4)->get();
        return view('detail',compact('products','products_with_detail'));
    }

    public function show()
    {
        if($key=request()->key){
            // dd($key);
            $products = Product::orderBy('created_at', 'DESC')
                        ->where('name', 'like', '%' . $key . '%')->paginate(10);
                        
         }
         else{
            $products = Product::orderBy('created_at', 'DESC')
            ->paginate(10);
         }
       
       return view('admin.index_product',compact('products'));
    }
   
    public function create(Request $request){
        $categories = Category::all();
       return view('admin.add_product',compact('categories'));
    }
public function store(Request $request){
    //upload file
   
  if($request->hasFile('photo')){
    $file = $request->photo->getClientOriginalName();
        // Lấy tên gốc của file

        // Lưu file
        $request->photo->storeAs('public/images',$file);

        // Thêm tên file vào dữ liệu request
        $request->merge(['image' => $file]); // đặt theo tên file trng database
  }
        Product::create($request->all());
       return redirect()->route('index_product')->with('success','cập nhật thành công');
   }

    public function edit($id)
    {
        $products = Product ::findOrFail($id);
        return view('admin.edit_product',compact('products','id') );
    
    }

   
    public function update(Request $request, $id)
    {
        if($request->hasFile('photo')){
            $file = $request->photo->getClientOriginalName();
                // Lấy tên gốc của file
        
                // Lưu file
                $request->photo->storeAs('public/images',$file);
        
                // Thêm tên file vào dữ liệu request
                $request->merge(['image' => $file]); // đặt theo tên file trng database
          }
        $products = Product::findOrFail($id);
        // dd($request->all());
       
            $products->update($request->all());

            return redirect()->route('index_product')->with('success','Cập nhật thành công');
        // }
        // catch (\Throwable $th) {
        //     return redirect()->back()->with('error','cập nhật không thành công !!!');
        //   } 
    }
    public function destroy($id)
    {
        try{
            $products = Product::findOrFail($id);
            $products->delete();
            return redirect()->route('index_product')->with('success','Đã xóa thành công');
        }
        catch (\Throwable $th) {
            return redirect()->back()->with('error','Xóa không thành công !!!');
          } 
    }

    public function add_favorite_products($id){
        if(!Auth::check()){
            return redirect()->back()->with('error','Vui lòng Đăng nhập');

        }
    $products= FavoriteProduct::where([
        'product_id'=>$id,
        'user_id'=>Auth::id(),

    ])->first();
    if($products){
        return redirect()->back()->with('error','Sản phẩm Đã có trong mục yêu thích');
    }
    $userid=Auth::id();
    $products_fr = new FavoriteProduct();
     
    $products_fr->product_id=$id;
    $products_fr->user_id=$userid;
     
    $products_fr->save();
     if($products_fr){
        return redirect()->back()->with('success','Sản phẩm Đã Được yêu thích');
       }
       return redirect()->back()->with('erorr','Thêm thất bại');
     }

     
     public function get_favorite_products(){
        $user = Auth::user();
        $favorites = $user->favorites;
        $orders=Order::where('user_id',Auth::id())->with('orderItems.product')->get();
       return view('user',compact('favorites','user','orders'));
    }
    
    public function delete_favorite_products($id){
        try {
            
            $user = Auth::user();
            $user->favorites()->detach($id);
            $this->emit('favoriteRemoved', $id);
            return redirect()->route('get_favorite_products')->with('success', 'Đã xóa thành công');
        } catch (\Throwable $th) {
            // Log the exception for debugging
            \Log::error('Error deleting favorite product: ' . $th->getMessage());
            return redirect()->route('get_favorite_products')->with('error', 'Xóa không thành công');
        }
      

    }
    public function huydonhang( Request $request,$id){
        $order=Order::findOrFail($id);
        $order->status = 'huy-don';
        $order->save();
        return redirect()->route('get_favorite_products')->with('success','Cập nhật thành công');
    }
}
