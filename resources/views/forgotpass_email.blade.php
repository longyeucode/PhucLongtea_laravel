@extends('header')
@section('content')
<section class="h-100 gradient-form " >
    <div class="container  h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0 ">
              <div class="col-lg-6 ">
                <div class="card-body p-md-5 mx-md-4 ">
  
                  <div class="text-center">
                    <img src="./img/logophuclong.png"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1 text-success">Vui lòng nhập email</h4>
                    @if ($message = Session::get('error'))

             <div class="alert alert-danger  alert-block">
            <strong>{{ $message }}</strong>
             </div>
             @endif
                  </div>
  
                  <form method="POST">
                    @csrf
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">Email</label>
                      <input name="email" type="email" id="form2Example11" class="form-control"
                        placeholder=""/>
                     
                    </div>
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-success btn-block fa-lg gradient-custom-2 mb-3" type="submit">
                        Nhập
                      </button>
                        <br>
                     
                      
                    </div>
  
                   
  
                  </form>
  
                </div>
              </div>
              <div class=" login_banner col-lg-6 d-flex bg-success text-white align-items-center gradient-custom-2">
               
                <div class="text px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">Đem niềm vui đến cho khách hàng</h4>
                  <p style="font-family: 'Courier New', Courier, monospace" class="small mb-0">Đặt ngay dịch vụ trung chuyển thuận tiện và thoải mái đến công viên Safari World!
                    Tham quan công viên Safari Park, một vườn thú mở với hàng trăm loài động vật sống trong môi trường tự nhiên
                   
                  
                    </p>
                    <img class="mt-2" src="./img/nguon-goc-phuc-long.jpg" alt="" style="width:100%; border-radius:20px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection