<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>laundry service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('newbiz/img/favicon.png') }}" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('newbiz/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('newbiz/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('newbiz/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('newbiz/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('newbiz/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('newbiz/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('newbiz/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: NewBiz
      Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>
<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <h2 class="topic3">ยินดีต้อนรับ<br><h3 class="topic2" style="margin-left: 30px">ร้านซักรีดออนไลน์</h3></h2>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
{{--            <a href="#intro" class="scrollto"><img src="{{ asset('newbiz/img/logo.png') }}" alt="" class="img-fluid"></a>--}}
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#intro">หน้าแรก</a></li>
                {{--<li><a href="#about">เกี่ยวกับ</a></li>--}}
                <li><a href="#services">โปรโมชั่น</a></li>
                {{--<li><a href="#portfolio">Portfolio</a></li>--}}
                {{--<li><a href="#contact">ติดต่อเรา</a></li>--}}
                <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                {{--<li><a href="#contact">เข้าสู่ระบบ</a></li>--}}
            </ul>
        </nav><!-- .main-nav -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix">
    <div class="container">
        <div class="intro-img">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row offset-md-1">
                        <div class="col">

                        </div>
                        <label for="username" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('ชื่อผู้ใช้ :') }}</label>
                        <div class="col-md-4">
                            <input id="username" type="text" autocomplete="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"  autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row offset-md-1">
                        <div class="col">

                        </div>
                        <label for="password" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('รหัสผ่าน :') }}</label>

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <div class="col-md-6 offset-md-4">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                <label class="form-check-label" for="remember">--}}
{{--                                    {{ __('Remember Me') }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row mb-0 offset-md-8" style="padding-left: 4%">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                    {{ __('Forgot Your Password?') }}--}}
{{--                                </a>--}}
{{--                            @endif--}}
                        </div>
                    </div>
                </form>
{{--            <div class="row">--}}
{{--                <div class="col">--}}

{{--                </div>--}}
{{--                <label class="letter-white">ID :</label>--}}
{{--                <div class="col-md-4">--}}
{{--                    <div>--}}
{{--                        <input id="username" name="username" type="text" class="form-control" required>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}

{{--                </div>--}}
{{--                <label class="letter-white" style="margin-top: 10px">Password :</label>--}}
{{--                <div class="col-md-4">--}}
{{--                    <input id="username" name="username" type="text" class="form-control" style="margin-top: 10px" required>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}

{{--                </div>--}}
{{--                <div class="col-md-1">--}}
{{--                    <a class="btn login" style="margin-top: 10px">Login</a>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}

{{--                </div>--}}
{{--            </div>--}}

            <img src="{{ asset('newbiz/img/laundry1.png') }}" alt="" class="img-fluid">
        </div>
        {{--<div class="card text-center">--}}
            {{--<div class="card-header">--}}
                {{--<ul class="nav nav-tabs card-header-tabs">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link active" href="#">Active</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">Link</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<h5 class="card-title">Special title treatment</h5>--}}
                {{--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="card">
            <div class="card-header">
                <h6 class="topic4">โปรโมชั่น</h6>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i style="color:#41cf2e;"></i></div>
                            <h4 class="title topic4"><a href="">โปรโมชั่นรายเดือน</a></h4>
                            <p class="description topic4">ซักเกิน 90 กิโลขึ้นไปมีส่วนลด 5 %</p>
                        </div>
                    </div>
                    {{--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>--}}
                </blockquote>
            </div>
        </div>
        {{--<div>--}}
            {{--<h2 class="topic">ยินดีต้อนรับ<br><h3 class="topic1">ร้านซักรีดออนไลน์</h3></h2>--}}
            {{--<h2>We provide<br><span>solutions</span><br>for your business!</h2>--}}
            {{--<div>--}}
                {{--<a href="#about" class="btn-get-started scrollto">Get Started</a>--}}
                {{--<a href="#services" class="btn-services scrollto">Our Services</a>--}}
                {{--<a href="#about" class="btn-get-started scrollto">Login</a>--}}
                {{--<a href="#services" class="btn-services scrollto">Register</a>--}}
                {{--<div class="container">--}}
                    {{--<div style="max-width: 18rem;">--}}
                        {{--<h3 class="colorwhite">เกี่ยวกับ</h3>--}}
                        {{--<div>--}}
                            {{--<h5 class="card-title colorwhite" style="margin-left: 20px">บริการซัก อบ รีด</h5>--}}
                            {{--<p class="card-text colorwhite" style="margin-left: 20px">ร้านซัก อบ รีด บริการรับ-ส่ง เสื้อผ้าลูกค้าถึงที่</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    </div>
</section><!-- #intro -->
<!-- Footer -->
<footer class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->

            <div class="col-lg-4 col-md-6 footer-info">
                <div style="max-width: 18rem;">
                    <h3 class="colorblack">ร้านซักรีดออนไลน์</h3>
                    <div>
                        <h5 class="card-title colorblack" style="margin-left: 20px">บริการซัก อบ รีด</h5>
                        <p class="card-text colorblack" style="margin-left: 20px">ร้านซัก อบ รีด บริการรับ-ส่ง เสื้อผ้าลูกค้าถึงที่</p>
                    </div>
                </div>
                {{--<h3>ร้านซักรีดออนไลน์</h3>--}}
                {{--<p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>--}}
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
                <h4 class="colorblack">ลิงค์สำคัญ</h4>
                <ul>
                    <li><a href="#" class="colorblack">หน้าแรก</a></li>
                    {{--<li><a href="#">About us</a></li>--}}
                    <li><a href="#" class="colorblack">โปรโมชั่น</a></li>
                    {{--<li><a href="#">Terms of service</a></li>--}}
                    {{--<li><a href="#" class="colorblack">Privacy policy</a></li>--}}
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-contact offset-1">
                <h4 class="colorblack">ติดต่อเรา</h4>
                <p class="colorblack">
                    45 sadao <br>
                    Thailand, Buriram<br>
                    plubplachai
                    <br>
                    <strong>Phone:</strong> 091-365-6985<br>
                    <strong>Email:</strong> laundry@gmail.com<br>
                </p>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 topic5">
        <a href="https://mdbootstrap.com/education/bootstrap/"></a>
    </div>
    <!-- Copyright -->

</footer>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{ asset('newbiz/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/mobile-nav/mobile-nav.js') }}"></script>
<script src="{{ asset('newbiz/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('newbiz/lib/lightbox/js/lightbox.min.js') }}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset('newbiz/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('newbiz/js/main.js') }}"></script>

</body>
</html>
