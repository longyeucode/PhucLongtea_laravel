@extends('header')
@section('content')
    
<div class="container">
    <!--Section: Contact v.2-->
<section class="mb-4 ">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center text-success my-4">Liên hệ với chúng tôi</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5 text-success">Nếu có vấn đề gì hãy điền thông tin bên dưới chúng tôi sẽ phản hối sau 15 phút</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-success" >Gửi ngay</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center ">
            <ul class="list-unstyled mb-0 bg-success rounded p-4 text-white">
                <li></i>
                    <p>278 Lê Văn Khương - Phường Thới An - Quận 12 - TPHCM</p>
                </li>

                <li></i>
                    <p>092.397.214</p>
                </li>

                <li></i>
                    <p>longnpps31349@fpt.edu.vn</p>
                </li>
            </ul>
        </div>


    </div>

</section>
<iframe
    class="w-100"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8646773194935!2d106.69899781476968!3d10.771130492330666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f5fd8be06d5%3A0xc7f1d7d4ba6591cb!2zMzI5IFThuqNuaCBUw6JuLCBD4bqnbiBCw6xuaCBWaeG7h3QgVsOqbiAxMCwgVsOqbiAxMDAwMDA!5e0!3m2!1sen!2suk!4v1647311535475!5m2!1sen!2suk"
    height="500"
></iframe>
</div>


@endsection