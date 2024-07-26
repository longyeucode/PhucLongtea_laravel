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
<style>
  
</style>
<body class="fw-medium">

  <nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
      <div class="container">

        <div class=" navbar navbar-nav ">
          <div class="col-2 mx-2 d-lg-none ">
            <a class="navbar-brand" href="index.html">
              <img class="w-100" src="{{asset('img/logophuclong.png')}}" alt="Your Logo">
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>


          </button>

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none flex-row ">

            <li class="nav-item mx-3">
              <a class="nav-link" href="signup.html">Đăng ký</a>
            </li>
            
            <li class="nav-item mx-2">
              <a class="bg-success rounded-pill nav-link text-white" href="#">Đăng nhập</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class=" col-1 d-flex justify-content-center">
              <a class="navbar-brand" href="/">
                <img style="width:105px;" class="img-fluid d-none d-lg-block" src="{{asset('img/logophuclong.png')}}" alt="Your Logo">
              </a>
            </div>


          <form class="d-flex  mt-3  mt-lg-0" role="search">
            <input class="form-control rounded-pill me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-success rounded-pill" type="submit"><i class=' text-white bx bx-search'></i></button>
          </form>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
      
            <li class="nav-item">
              <a class="nav-link " href="/product">Sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Liên Hệ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart">Giỏ hàng</a>
            </li>
            <li class="nav-item ">
              @if(Auth::check())
              <div class="btn-group">
                <a class="bg-success  nav-link text-white"> Xin chào: {{Auth::user()->name}}</a>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Đơn hàng </a></li>
                  <li><a class="dropdown-item" href="{{route('get_favorite_products')}}">Tài khoản </a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất </a></li>
                </ul>
              </div>
             
              @else
              <li class="nav-item d-lg-block d-none">
             
                <a class="nav-link" href="/register">Đăng ký</a>
              </li>
              <li class="nav-item d-lg-block d-none">
                <a class="bg-success rounded-pill nav-link text-white" href="/login">Đăng nhập</a>
              </li> 

             @endif
            </li>
            <li class="nav-item">
             
            </li>
           <li class="nav-item">
            {{-- <div class="container_menu">
              <!-- Button -->
              <button class="btn_menu">
             
                <a class="nav-link" href="/cart"><i class='bx bx-cart ' style="font-size: 30px "></i></a>
                
                <!-- Dropdown Menu -->
                <ul class="dropdown_menu">
                  <li class="active"><a href="#">Profile Information</a></li>
                  <li><a href="#">Change Password</a></li>
                  <li><a href="https://codepen.io/pro">Become <b>PRO</b></a></li>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Log Out</a></li>
                </ul>
              </button>
            </div>   --}}
            
           </li>
           
          </ul>

        </div>
      </div>

  </nav>
  

  @yield('content')
  <footer class="bg-success text-white pt-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="col-4 mb-4  ">
            <a class="navbar-brand" href="#">
              <img class="w-100" src="{{asset('./img/logophuclong.png')}} " alt="Your Logo">
            </a>
          </div>
          <h5>Liên hệ với chúng tôi </h5>
          <p class="m-0">Email: nplong2512004.com</p>
          <p>Phone: 0989-999-999</p>
        </div>
        <div class="col-md-3">
          <p>Điều khoản sử dụng</p>
          <div class="fw-light ">
            <p class="m-0">Chính sách bảo mật</p>
            <p class="m-0">Chính sách cookie</p>
            <p class="m-0">Phương trình kiểm lỗi</p>
            <p class="m-0">Chính sách bảo mật</p>
            <p class="m-0">Chính sách </p>

          </div>

        </div>
        <div class="col-md-3">
          <p>Tài trợ</p>
          <div class="fw-light ">
            <p class="m-0">Chính sách bảo mật</p>
            <p class="m-0">Chính sách cookie</p>
            <p class="m-0">Phương trình kiểm lỗi</p>
            <p class="m-0">Chính sách bảo mật</p>
            <p class="m-0">Chính sách </p>

          </div>

        </div>
        <div class="col-md-3">
          <p>Thanh toán</p>
          <div class="fw-light ">
            <p class="m-0">Chính sách thanh toán
            <div class="col-4  ">
              <a class="navbar-brand" href="#">
                <img class="w-100" src="{{asset('./img/tt.png')}}" alt="Your Logo">
              </a>
            </div>
            <div class="col-4  ">
              <a class="navbar-brand" href="#">
                <img class="w-100" src="{{asset('./img/tt22.png')}}" alt="Your Logo">
              </a>
            </div>
            </p>
          </div>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col">
          <p class="my-auto text-center">NguyenPhucLong ©2024 Your Website.</p>
        </div>
      </div>
    </div>
  </footer>

















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </script>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            const phoneInput = document.getElementById('phone');
            const phonePattern = /^(0[3|5|7|8|9])+([0-9]{8})$/;; // Định dạng số điện thoại 10 chữ số

            if (!phonePattern.test(phoneInput.value)) {
                phoneInput.classList.add('is-invalid');
                event.preventDefault(); // Ngăn không cho form submit
            } else {
                phoneInput.classList.remove('is-invalid');
            }
        });
   
  </script>
</body>

</html>