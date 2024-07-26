@extends('header')
@section('content')
<div class="container">
  @if ($message = Session::get('success') )

  <div class="alert alert-success  alert-block">
 <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('erorr') )

  <div class="alert alert-success  alert-block">
 <strong>{{ $message }}</strong>
  </div>
  @endif
    <div class="row mt-5">
        <div class="table-responsive">
    <table class="table">
   <thead>
   <tr>
     <th style="width: 100px;">ảnh</th>
     <th>Sản phẩm</th>
     <th>Giá bán</th>
     <th>Size</th>
     <th>Số lượng</th>
     <th> Thành tiền</th>
     <th>Hành động</th>
   </tr>
   </thead>
   @foreach ($cart as $item)
       

   <tbody>
   <td><img src="{{asset('img')}}/{{$item->product->image}}" alt="" class="w-100"></td>
  <td>{{$item->product->name}}</td>
   <td>{{$item->product->price}}$</td>
   <td>{{$item->size}}</td>
  <td class="d-flex">
    <form action="{{route('increase_cart',$item->id)}}" method="POST">
      @csrf
      <button class="btn btn-success" type="submit">+</button>
  </form>
  <p class="p-2">
  {{$item->quantity}}
</p>
  <form action="{{route('decrease_cart',$item->id)}}" method="POST">
      @csrf
      <button class="btn btn-success" type="submit">-</button>
  </form>
   </td>
  <td>{{$item->product->price*$item->quantity}}$</td>
  <td>
  <form action="{{route('delete_cart',$item->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
  </form>
</td>
  </tbody>
  
  @endforeach
 
   
   
   </table>
   </div>
   <div class="col-md-3 ms-auto">
   
   <div class="card ">
   <div class="card-header">
   <strong>Hóa đơn</strong>
   </div>
   <div class="card-body">
   <div class="row mb-2">
   <div class="col-6"> <strong>số lượng : </strong></div>
   <div class="col-6 text- end">
     {{ \App\Models\Cart::totalQuantity() }}
   </div>
   </div>
   
   <div class="row mb-2">
   <div class="col-6">
     <strong>Tổng tiền</strong></div>
   <div class="col-6 text- end">
    {{ $cart->sum(function($item) { return $item->product->price * $item->quantity; }) }}Đ
   </div>
   </div>
   </div>
   
   </div>
<button type="submit" class="btn btn-success m-2">
  <a href="{{route('checkout')}}" class="nav-link">Thanh Toán</a> </button>
   </div>
    </div>
    </div>
    
@endsection
