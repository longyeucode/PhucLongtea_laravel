
@extends('admin.header')
@section('content')
<div class="container">
    <h2 class="my-4">Order Details</h2>
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
    <div class="card mb-4">
        <div class="card-header">
             <h4>Mã đơn hàng: {{ $order->id }}</h4>
             <form action="{{ route('update_status_order', $order->id) }}" method="POST"> 
                 @csrf 
                 @method('PUT')
                 <p>Trạng Thái:</p>
               <select name="status" id="size" class="form-control" required >
                  <option value="cho-xac-nhan">Chờ xác nhận</option>
                  <option value="da-xac-nhan">Đơn hàng đã được xác nhận</option>
                  <option value="shipper-da-nhan-hang">Shipper Đã nhận đồ</option>
                  <option value="dang-giao">Đang vận chuyêr</option>
                  <option value="giao-thanh-cong">Giao thành công</option>
              </select>
           <button type="submit" class="btn btn-info mt-2">Lưu</button>
        </div>
        <div class="card-body">
            <h5>Thông tin người nhận</h5>
            <p><strong>Họ và tên</strong>:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
        </div> 
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Order Detail</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td> <img class="img-thumbnail img-fluid" style="width:100px" src="{{asset('./storage/images')}}/{{$item->product->image}}" alt=""></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ number_format($item->price, 2) }}đ</td>
                        <td>{{ number_format($item->price * $item->quantity, 2) }}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            <h5 class="text-right">Tổng tiền: {{ number_format($order->total_amount, 2)}}đ</h5>
            <h5 class="text-right">Phương thức thanh toán: {{ $order->payment}}</h5>
        </div>
    </div>
</div>
@endsection
