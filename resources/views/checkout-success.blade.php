
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/png" href="{{asset('img/logophuclong.png')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('./css/style.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Tilt+Warp&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Phúc Long drink</title>

</head>
<div class="container">
    <div class="d-flex justify-content-center align-items-center mb-2" ">
        <img src="{{asset('img/logophuclong.png')}}" class="img-fluid" width="15%" alt="Your Logo">
    </div>
   
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
            
          
        </div>
        <div class="card-body">
            <h5>Thông tin người nhận</h5>
            <p><strong>Họ và tên</strong>:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->phonenumber }}</p>
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
        </div>
    </div>
</div>

