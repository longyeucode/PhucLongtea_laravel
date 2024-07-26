
@extends('admin.header')
@section('content')
<div class="main-content p-5">
<table class="table">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
        
        <th>Ngày Đặt hàng</th>
        <th>Số Lượng</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        {{-- @foreach($order->orderItems as $item) --}}
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->allquantity }}</td>
             <td>{{ $order->total_amount}}Đ</td>
             <td> @php switch ($order->status) {
                case 'cho-xac-nhan':
echo'  <div class="badge text-bg-warning">Chờ xác nhận</div>';
break;
case 'da-xac-nhan':
echo'  <div class="badge text-bg-info">Đơn hàng đã được xác nhận</div>';
break;
case 'shipper-da-nhan-hang':
echo'  <div class="badge text-bg-primary">Shipper Đã nhận đồ</div>';
break;
case 'dang-giao':
  echo'  <div class="badge text-bg-success">Đang vận chuyêr</div>';
  break;
  case 'giao-thanh-cong':
    echo'  <div class="badge text-bg-success">Giao thành công</div>';
    break;
  case 'huy-don':
    echo'  <div class="badge text-bg-warning">Đã hủy</div>';
    break;
              }
            
             @endphp
              </td> 
          <td><a href="{{route('order_detail_get',$order->id)}}" >Xem thêm</a></td>
        </tr>
        {{-- @endforeach --}}
        @endforeach
    </tbody>
</table>
</div>
@endsection