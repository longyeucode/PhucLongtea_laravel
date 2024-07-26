@extends('header')
@section('content')
    
<style>
 
 
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
    
    .col-50{
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
    
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
    
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
    
    .main_checkout {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
    
     input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    col-50 label {
      margin-bottom: 10px;
      display: block;
    }
    
    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }
    
    .form_checkout .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
    
    .form_checkout .btn:hover {
      background-color: #45a049;
    }
    
    a {
      color: #2196F3;
    }
    
    hr {
      border: 1px solid lightgrey;
    }
    
    span.price {
      float: right;
      color: grey;
    }
    
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>
    </head>
    <body>
      <div class="row">
        <div class="col-75">
            <div class="container main_checkout">
                <form class="form_checkout" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
    
                    <div class="row">
                        <div class="col-10">
                            <h3>Thông Tin Thanh Toán</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="fullname" value="{{ $user->name }}" required>

                            <label ><i class="fa fa-address-card-o"></i> Phone</label>
                            <input type="number" id="adr" name="phonenumber" value="{{ $user->phonenumber }}" required>

                            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                            <input type="text" id="adr" name="address" value="{{ $user->address }}" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Email</label>
                            <input type="text" id="adr" name="email" value="{{ $user->email }}" required>
                            {{-- <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required> --}}
                            
                        </div>
    
                        <div class="col-50">
                            <h3>Payment</h3>
                            {{-- <select name="payment" type class="form-control" required >
                              <option  value="Thanh-toan">Thanh toán khi nhận hàng</option> --}}
                             <input type="text" name="payment" value="Thanh toán khi nhận" required >
                              
                          </select>
                            <label for="fname">Accept</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                        </div>
                    </div>
                    
                    <label>
                        <input type="checkbox" checked="checked" name="terms"> Đồng ý Điều khoản
                    </label>
                    <input type="submit" value="Thanh Toán" class="btn">
                </form>
            </div>
        </div>
        <div class="col-25">
          <div class="container border">
              <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ $cartItems->count() }}</b></span></h4>
              @foreach($cartItems as $item)
                  <p>{{ $item->product->name }} (Size: {{ $item->size }},  Số lượng: {{ $item->quantity }}) giá :{{ $item->product->price * $item->quantity }}Đ
                      {{-- <span class="price">${{ $item->product->price * $item->quantity }}</span> --}}
                  </p>
              @endforeach
              <hr>
              <p>Total <span class="price" style="color:black"><b>${{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }}</b></span></p>
          </div>
      </div>
    </div>
@endsection