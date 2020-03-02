<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.index') }}" class="nav-link" {{ Route::currentRouteName() == 'admin.index' ? 'active' : null }}>Home</a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"></span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> โปรไฟล์
{{--                    <span class="float-right text-muted text-sm">3 mins</span>--}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.edit') }}" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> แก้ไขข้อมูลส่วนตัว
                </a>
                <div class="dropdown-divider"></div>
                <form method="post" action="{{ route('admin.logout') }}">
                    @csrf
                <button href="#" class="dropdown-item" type="submit" onclick="return confirmation()">
                    <i class="fas fa-sign-out-alt mr-2"></i> ออกจากระบบ
                </button>
                </form>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
@push('script')
    <script type="text/javascript">
        function confirmation() {
            return confirm('ออกจากระบบหรือไม่?');
        }
    </script>
@endpush
