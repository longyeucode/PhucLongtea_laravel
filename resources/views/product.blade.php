@extends('header')
@section('content')
<div class="container ">
    <div class="row mt-5 ">
      <div class="col-2 d-none d-lg-block">
        <form method="POST" action="" class="form-inline">
          @csrf
          <div class="d-flex">
          <div class="form-group mb-2">
              <input type="text" class="form-control" name="key" placeholder="nhập tên .....">
          </div>
          <button  type="submit" class="btn btn-success mx-1 mb-2 ml-2">
              <i class='bx bx-search-alt-2'></i>
          </button>
        </div>
      </form>
        
        <ul class="list-group list-group-flush sticky-top">
          <h4>Danh mục </h4>
          @foreach ($categories as $item)
          
          <li class="list-group-item list-group-item-action"><a href="/product/{{$item->id}}" class="font-weight-light text-dark text-decoration-none">{{$item->name}}</a></li>
             
          @endforeach
          </ul>
      </div>
      
    <div class="col-lg-10 col-sm-12 col-md-12">
      <div class="row">
        @foreach ($products as $item)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
          <div class="cart">
            <a href="/product/detail/{{$item->slug}}/{{$item->category_id}}">
            <img src="{{asset('./storage/images')}}/{{$item->image}}" class="card-img-top" alt="..." >
            </a>
            <div class="card-body py-0">
              <p class=" name_prd mb-0 mt-2 text-center"  style="'">{{$item->name}}</p>
              <p class="text-success text-center mb-0  " style="font-size:20px"> {{number_format($item->price)}} Đ</p>
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
       
        <div class="d-flex justify-content-center align-items-center">
          {{$products->links()}}
      </div>
      
    </div>
    </div>
    
    
    </div>
   
    </div>
  
  
@endsection
