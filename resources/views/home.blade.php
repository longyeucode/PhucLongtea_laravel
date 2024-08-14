@extends('header')
@section('content')
@if ($message = Session::get('error'))

<div class="alert alert-danger  alert-block text-center">
<strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block text-center">
<strong>{{ $message }}</strong>
</div>
@endif
<div class="container ">
  <ul class="navbar navbar-nav flex-row col-11 ">
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link d-none d-lg-block" href="#"> <i class='bx  bx-map'></i>Trà sữa</a>
    </li>
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"><i class='bx bxs-tree-alt'></i>Trà hoa quả</a>
    </li>
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"><i class='bx bx-home'></i>Cà phê</a>
    </li>
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"> <i class='bx bx-walk'></i>Bánh ngọt</a>
    </li>
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"><i class='bx bxs-car-garage'></i>Cà phê set</a>
    </li>
    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"><i class='bx bxs-car-garage'></i>Trà gói</a>
    </li>

    <li class="nav-item d-none d-lg-block">
      <a class="nav-link" href="#"> <img style="width:20px" src="./img/category_36_gift_card.png" class="pb-1"
          alt="">Phiếu quà tặng</a>
    </li>
    
  </ul>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./img/banerphuclong3.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./img/bannerindex.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./img/banerphuclong2.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <div class="container">
    <div class="row mt-5">
      <h2 class="header-title mb-4 mt-2">
        New!
      </h2>
    </div>
    <div class="row">
      
      @foreach ($products_new as $item)

      <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
        <div class="cart">
          <a href="{{route('add_favorite_products',$item->id)}}">
          <i class='bx bxs-heart text-danger me-auto' ></i>
        </a>
          <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
          <img src="./img/{{$item->image}}" class="card-img-top" alt="..." >
        </a>
          <div class="card-body py-0">
            <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
            <p class="text-success text-center mb-0  " style="font-size:20px"> 25.000 Đ</p>
            <button type="submit" class="btn btn_dathang btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="text_btn">Đặt hàng</p></button>
          {{-- Model --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="product-image col-lg-3">
                      <img src="{{asset('img')}}/{{$item->image}}" alt=" " style="width:100%">     
                     </div>
                     <div class="product-description col-lg-6">
                         <h2>{{$item->name}}</h2>
                         <div class="form-group">
                           <label for="size">Size</label>
                           <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                             @csrf
                           <select name="size" id="size" class="form-control" required>
                               <option value="Small">Small</option>
                               <option value="Medium">Medium</option>
                               <option value="Large">Large</option>
                           </select>
                       </div>
                         <div class="quantity-input">
                          <div class="quantity-input">
                            {{-- <button class="btn-minus">-</button> --}}
                            <input name="quantity" type="text" class="quantity" value="1">
                            {{-- <button class="btn-plus">+</button> --}}
                          </div>
                         </div>
                         <h2 class="mt-3 text-success">Giá :<?= number_format($item['price']);?> / 1ly</h2>
                         <button type="submit" class=" btn_dathang_deatail btn  " >Đặt hàng</button>
                       </form>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success">Đặt hàng</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach

        <div class=" d-flex justify-content-center">
          <button type="button" class="btn bg-success w-25 text-white">Xem thêm</button>
        </div>
      
    </div>
  </div>
  <div class="container">
    <div class=" banner_index row ">
      <div class="  col-lg-6 col-md-12 col-sm-12 p-2 ">
        <h3 style="color: rgb(25 135 84)"> Trà xanh giải sầu </h3>
        <P class="title_banner">Sau 50 năm kinh nghiệm trồng và phát triển lá trà và hạt cà phê chất lượng cao nhất cùng với sự tận tâm mang lại trải nghiệm đáng nhớ cho khách hàng, Phúc Long đã nổi tiếng là thương hiệu tiên phong có nhiều ý tưởng sáng tạo cho ngành trà và cà phê.</P>
        <button class="btn border-success bg-success text-white" style="">Xem thêm --></button>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 p-2 ">
      <img class="img_bannerindex" src="./img/nguon-goc-phuc-long.jpg" style="width:100%" alt="">
      </div>
    </div>
  </div>




    <div class="container">
      <div class="row ">
        <h2 class="header-title mb-4 mt-2">
          Trà sữa 
        </h2>
      </div>
      <div class="row">
        @foreach ($products_trasua as $item)

      <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
        <div class="cart">
          <a href="{{route('add_favorite_products',$item->id)}}">
          <i class='bx bxs-heart text-danger me-auto' ></i>
        </a>
          <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
          <img src="./img/{{$item->image}}" class="card-img-top" alt="..." >
        </a>
          <div class="card-body py-0">
            <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
            <p class="text-success text-center mb-0  " style="font-size:20px"> 25.000 Đ</p>
            <button type="submit" class="btn btn_dathang btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="text_btn">Đặt hàng</p></button>
          {{-- Model --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="product-image col-lg-3">
                      <img src="{{asset('img')}}/{{$item->image}}" alt=" " style="width:100%">     
                     </div>
                     <div class="product-description col-lg-6">
                         <h2>{{$item->name}}</h2>
                         <div class="form-group">
                           <label for="size">Size</label>
                           <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                             @csrf
                           <select name="size" id="size" class="form-control" required>
                               <option value="Small">Small</option>
                               <option value="Medium">Medium</option>
                               <option value="Large">Large</option>
                           </select>
                       </div>
                         <div class="quantity-input">
                           <button class="btn-minus">-</button>
                           <input type="text" class="quantity" value="0">
                           <button class="btn-plus">+</button>
                         </div>
                         <h2 class="mt-3 text-success">Giá :<?= number_format($item['price']);?> / 1ly</h2>
                         <button type="submit" class=" btn_dathang_deatail btn  " >Đặt hàng</button>
                       </form>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success">Đặt hàng</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach

          <div class=" d-flex justify-content-center">
            <button type="button" class="btn bg-success w-25 text-white">Xem thêm</button>
          </div>
        
      </div>
    </div>

  <div class="container">
    <div class=" banner_index row ">
      
      <div class="col-lg-6 col-md-12 col-sm-12 p-2 ">
      <img class="img_bannerindex" src="./img/bannerindex3.jpg" style="width:100%" alt="">
      </div>
      <div class="  col-lg-6 col-md-12 col-sm-12 p-2 ">
        <h3 style="color: rgb(25 135 84)"> Grand opening </h3>
        <P class="title_banner">Sau 50 năm kinh nghiệm trồng và phát triển lá trà và hạt cà phê chất lượng cao nhất cùng với sự tận tâm mang lại trải nghiệm đáng nhớ cho khách hàng, Phúc Long đã nổi tiếng là thương hiệu tiên phong có nhiều ý tưởng sáng tạo cho ngành trà và cà phê.</P>
        <button class="btn border-success bg-success text-white" style="">Xem thêm --></button>
      </div>
    </div>
  </div>
  

  <div class="container">
    <div class="row ">
      <h2 class="header-title mb-4 mt-2">
        Trà hoa quả
      </h2>
    </div>
    <div class="row">
      @foreach ($products_tra as $item)

      <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
        <div class="cart">
          <a href="{{route('add_favorite_products',$item->id)}}">
          <i class='bx bxs-heart text-danger me-auto' ></i>
        </a>
          <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
          <img src="./img/{{$item->image}}" class="card-img-top" alt="..." >
        </a>
          <div class="card-body py-0">
            <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
            <p class="text-success text-center mb-0  " style="font-size:20px"> 25.000 Đ</p>
            <button type="submit" class="btn btn_dathang btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="text_btn">Đặt hàng</p></button>
          {{-- Model --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="product-image col-lg-3">
                      <img src="{{asset('img')}}/{{$item->image}}" alt=" " style="width:100%">     
                     </div>
                     <div class="product-description col-lg-6">
                         <h2>{{$item->name}}</h2>
                         <div class="form-group">
                           <label for="size">Size</label>
                           <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                             @csrf
                           <select name="size" id="size" class="form-control" required>
                               <option value="Small">Small</option>
                               <option value="Medium">Medium</option>
                               <option value="Large">Large</option>
                           </select>
                       </div>
                         <div class="quantity-input">
                           <button class="btn-minus">-</button>
                           <input type="text" class="quantity" value="0">
                           <button class="btn-plus">+</button>
                         </div>
                         <h2 class="mt-3 text-success">Giá :<?= number_format($item['price']);?> / 1ly</h2>
                         <button type="submit" class=" btn_dathang_deatail btn  " >Đặt hàng</button>
                       </form>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success">Đặt hàng</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach

        <div class=" d-flex justify-content-center">
          <button type="button" class="btn bg-success w-25 text-white">Xem thêm</button>
        </div>
      
    </div>
  </div>
{{-- <div class="container">
  <div class="row ">
    <h2 class="header-title mt-5 mb-4">
      Hot nhất tại đây
    </h2>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center  p-2 ">
      <div class="border">
        <img src="./img/veeon5jzqyjccj5m3lkg.webp" class="w-50 p-2" alt="">
        <div class="p-2">
          <p>Xem blog của chúng tôi</p>
          <span class="fw-light">Đặt vé xác nhận ngay, miễn xếp hàng, miễn phí hủy, tiện lợi cho bạn tha hồ khám phá
          </span>
          <br>
          <button type="button" class="btn-25 bg-white mt-2 ">Xem thêm</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center  p-2 ">
      <div class="border">
        <img src="./img/ggxmmubhiq9nxkbobcro.webp" class="w-50 p-2" alt="">
        <div class="p-2">
          <p>Tiết kiệm hơn</p>
          <span class="fw-light">Đặt vé xác nhận ngay, miễn xếp hàng, miễn phí hủy, tiện lợi cho bạn tha hồ khám phá
          </span>
          <br>
          <button type="button" class="btn-25 bg-white mt-2 ">Xem thêm</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center p-2 ">
      <div class="border">
        <img src="./img/arto4pac628jzdsuu3df.webp" class="w-50 pt-2" alt="">
        <div class="p-2">
          <p>Nhận ưu đãi khi đi chung</p>
          <span class="fw-light">Đặt vé xác nhận ngay, miễn xếp hàng, miễn phí hủy, tiệm phá </span>
          <br>
          <button type="button" class="btn-25 bg-white mt-2 ">Xem thêm</button>
        </div>
      </div>
    </div>

  </div>
</div> --}}
@endsection 