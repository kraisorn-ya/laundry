<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('users.order.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
{{--            <i class="fas fa-laugh-wink"></i>--}}
            <i class="fas fa-calendar"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ใช้บริการ <sup></sup></div>
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
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-bell"></i>
            <span>แจ้งเตือน</span></a>
    </li>
</ul>