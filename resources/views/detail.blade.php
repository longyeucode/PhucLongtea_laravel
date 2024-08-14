@extends('header')
@section('content')
    
@if ($message = Session::get('success') )

<div class="alert alert-success text-center alert-block">
<strong>{{ $message }}</strong>
</div>
@endif
<div class="container mt-5 ">
  <div class="row">
  <div class="product-image col-lg-3">
   <img src="{{asset('img')}}/{{$products->image}}" alt=" " style="width:100%;">
  
           
  </div>
  <div class="product-description col-lg-6">
      <h2>{{$products->name}}</h2>
      <p style="font-family:">{!!$products->description!!}</p>
      <div class="form-group">
        <label for="size">Size</label>
        <form action="{{ route('add_to_cart', $products->id) }}" method="POST">
          @csrf
         <select name="size" id="size" class="form-control" required>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
        </select>
    </div>
      <div class="quantity-input">
        {{-- <button class="btn-minus">-</button> --}}
        <input name="quantity" type="text" class="quantity" value="1">
        {{-- <button class="btn-plus">+</button> --}}
      </div>
      <h2 class="mt-3 text-success">Giá :{{number_format($products->price);}} / 1ly</h2>
      <button type="submit" class=" btn_dathang_deatail btn  " >Đặt hàng</button>
        </form>
  </div>


<div class="comment-section col-lg-3 border">
  <h5>Comment:</h5>
  <ul class="comment-list overflow-auto" style="font-family: 'Courier New', Courier, monospace; max-height: 300px;">
   @foreach ($comment as $item)
    <li class="my-3">
      <div class="user"> <strong>{{$item->user->name}}:</strong>{{$item->content}}</div>
      <div class="comment"></div>
      <div class="rating"><strong>Đánh giá:</strong> ⭐️⭐️⭐️⭐️⭐️</div>
      {{$item->created_at->diffForHumans()}}
    </li>
    @endforeach
    <!-- Các mục bình luận khác -->
  </ul>
  <div class="comment-input">
    <form action="{{route('post_comment',$products->slug)}}">
      <input type="text" name="content"id="comment" placeholder="Nhập bình luận của bạn...">
      <button type="submit">Gửi</button>
    </form>
    
  </div>
</div>
</div>

<div class=" product_lq row ">
  <h2 class="mb-5">Liên quan</h2>
  @foreach ($products_with_detail as $item)
      

  <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
    <div class="cart">
      <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
        <img src="{{asset('./storage/images')}}/{{$item->image}}" class="card-img-top" alt="..." >
      </a>
      <div class="card-body py-0">
        <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
        <p class="text-success text-center mb-0  " style="font-size:20px"> 25.000 Đ</p>
      <button class=" btn_dathang btn   " ><p class="text_btn">Đặt hàng</p></button>
      </div>
    </div>
  </div>
  @endforeach



  
</div>

</div>
 

@endsection