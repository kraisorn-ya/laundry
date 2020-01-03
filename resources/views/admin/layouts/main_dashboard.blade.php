<!doctype html>
<html>
<head>
    <title> @yield('title') </title>
    {{--        <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('img/laundry1.png') }}" rel="icon">
    <link href="{{ asset('css/bootstrap') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('jquerydatepicker/jquery-ui.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('jquerydatepicker/jquery-timepicker-addon.css') }}" type="text/css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    @include('admin.partials.sidebar_dashboard')
    <div  id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.partials.navbar_dashboard')
            <section>
                @yield('content')
            </section>
        </div>
        @include('admin.partials.footer_dashboard')
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบหรือไม่?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">เลือก "ออกจากระบบ" หากคุณต้องการออกจากระบบ</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('ออกจากระบบ') }}
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.script')
@stack('script')
</body>
</html>