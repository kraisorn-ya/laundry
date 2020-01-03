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

<!--==========================
Header
============================-->
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
                <li><a href="#contact">สมัครสมาชิก</a></li>
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
            <div class="row">
                <div class="col">

                </div>
                <label class="letter-white">ID :</label>
                <div class="col-md-4">
                    <div>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <label class="letter-white" style="margin-top: 10px">Password :</label>
                <div class="col-md-4">
                    <input id="username" name="username" type="text" class="form-control" style="margin-top: 10px" required>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col-md-1">
                    <a class="btn login" style="margin-top: 10px">Login</a>
                </div>
                <div class="col-md-3">

                </div>
            </div>

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
    <div class="col-lg-3 col-md-6 footer-contact offset-1" style="margin-top: 5%">
        <h4 class="colorwhite">ติดต่อเรา</h4>
        <p class="colorwhite">
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
</section><!-- #intro -->




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
