<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
{{--            <i class="fas fa-calendar"></i>--}}
        </div>
        <div class="sidebar-brand-text mx-3">Laundry <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

{{--    <hr class="sidebar-divider my-0">--}}
    @if(auth()->user()->status_id == 1)
    <li class="nav-item {{ Route::currentRouteName() == 'users.order.index' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.order.index') }}">
            <i class="fas fa-credit-card"></i>
            <span>ใช้บริการ</span></a>
    </li>
    @endif
    <hr class="sidebar-divider my-0">
{{--    <li class="nav-item {{ Route::currentRouteName() == 'users.package.index' ? 'active' : null }}">--}}
{{--        <a class="nav-link" href="{{ route('users.package.index') }}">--}}
{{--            <i class="fas fa-shopping-cart"></i>--}}
{{--            <span>แพ็คเกจ</span></a>--}}
{{--    </li>--}}
    <hr class="sidebar-divider">

    <li class="nav-item {{ Route::currentRouteName() == 'users.order-details.index' || Route::currentRouteName() == 'users.order-details.details' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.order-details.index') }}">
            <i class="fas fa-envelope"></i>
            <span>รายการเสื้อผ้า</span></a>
    </li>

    <li class="nav-item {{ Route::currentRouteName() == 'users.all-order-details.index' || Route::currentRouteName() == 'users.all-order-details.details' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.all-order-details.index') }}">
            <i class="fa fa-book"></i>
            <span>รายการใช้บิรการทั้งหมด</span></a>
    </li>

    <li class="nav-item {{ Route::currentRouteName() == 'users.profile' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.profile') }}">
            <i class="fas fa-id-card"></i>
            <span>โปรไฟล์</span></a>
    </li>

    <li class="nav-item {{ Route::currentRouteName() == 'users.edit' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.edit') }}">
            <i class="fas fa-edit"></i>
            <span>แก้ไขข้อมูลส่วนตัว</span></a>
    </li>

{{--    <li class="nav-item {{ Route::currentRouteName() == 'users.package.index' ? 'active' : null }}">--}}
{{--        <a class="nav-link" href="{{ route('users.package.index') }}">--}}
{{--            <i class="fas fa-shopping-cart"></i>--}}
{{--            <span>แพ็คเกจ</span></a>--}}
{{--    </li>--}}

{{--    <li class="nav-item ">--}}
{{--        <a class="nav-link" href="#">--}}
{{--            <i class="fas fa-bell"></i>--}}
{{--            <span>แจ้งเตือน</span></a>--}}
{{--    </li>--}}
</ul>