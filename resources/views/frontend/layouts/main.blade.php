<!doctype html>
<html>
    <head>
        <title> @yield('title') </title>
        <meta charset="utf-8">
{{--        <title>laundry service</title>--}}
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

        <!-- Favicons -->
        <link href="{{ asset('newbiz/img/laundry1.png') }}" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{ asset('newbiz/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Libraries CSS Files -->
        <link href="{{ asset('newbiz/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('newbiz/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('newbiz/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('newbiz/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('newbiz/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{ asset('newbiz/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('frontend.partials.header')
        @yield('content')
        @include('frontend.partials.footer')
        @include('frontend.layouts.script')
        @stack('script')
    </body>
</html>
