@extends('header')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Tài khoản</h1>
                <div class="card mb-4">
                    <div class="card-body p-3">
                        @if ($message = Session::get('error'))

                        <div class="alert alert-danger  alert-block">
                       <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))

                        <div class="alert alert-success  alert-block">
                       <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{route('update_user')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phonenumber" value="{{ $user->phonenumber ?? '' }}" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập số điện thoại hợp lệ.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? '' }}" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <h2>Favorite Products</h2>
                @if($favorites->isEmpty())
                    <p>Không có sản phẩm yêu thích nào</p>
                @else
                <div class="col-lg-10 col-sm-12 col-md-12">
                    <div class="row">
                      @foreach ($favorites as $item)
                      <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                        <div class="cart">
                          <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
                          <img src="{{asset('./storage/images')}}/{{$item->image}}" class="card-img-top" alt="..." >
                          </a>
                          <div class="card-body py-0">
                            <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
                            <p class="text-success text-center mb-0  " style="font-size:20px"> {{number_format($item->price)}} Đ</p>
                            <div class="text-center">
                                <form action="{{route('delete_favorite_products',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                  </form>
                                  
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                  </div>
                  </div>
                @endif

                <h2>Orders</h2>
               
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                            
                            <th>Ngày Đặt hàng</th>
                            <th>Số Lượng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
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
                                    echo '<div class="badge text-bg-warning">Chờ xác nhận</div>
      <a class=" badge btn btn-danger" href="' . route('huydonhang', $order->id) . '">Hủy đơn hàng</a>';


                break;
                case 'da-xac-nhan':
                  echo'  <div class="badge text-bg-info">Đơn hàng đã được xác nhận</div>';
                  break;
                  case 'shipper-da-nhan-hang':
                    echo'  <div class="badge text-bg-primary">Shipper Đã nhận đồ</div>';
                    break;
                    case 'dang-giao':
                      echo'  <div class="badge text-bg-success">Đang vận chuyển</div>';
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
                                {{-- @if ($loop->first)
                                <td rowspan="{{ $order->orderItems->count() }}">${{ number_format($order->total_amount, 2) }}</td>
                                <td rowspan="{{ $order->orderItems->count() }}">{{ $order->getStatusLabel() }}</td>
                                @endif --}}
                            </tr>
                            {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>

    @endsection
