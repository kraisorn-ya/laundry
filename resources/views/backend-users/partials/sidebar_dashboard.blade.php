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

    <li class="nav-item {{ Route::currentRouteName() == 'users.order.service' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.order.service') }}">
            <i class="fas fa-credit-card"></i>
            <span>เรียกใช้บริการ</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    <hr class="sidebar-divider">

    <li class="nav-item {{ Route::currentRouteName() == 'users.order-details.index' || Route::currentRouteName() == 'users.order-details.details' ||
    Route::currentRouteName() == 'users.order-details.pay' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.order-details.index') }}">
            <i class="fas fa-envelope"></i>
            <span>รายการเสื้อผ้า</span>
            <?php
            $users = Auth::user()->id;
            $orders = \App\Order::query()
                ->where('user_id',$users)
                ->where('order_status','!=','0')
                ->where('order_status','!=','5')
                ->get();
            $noti_order = count($orders);
            ?>
            <span>
        @if( $noti_order != null)
                    <span class="badge badge-danger">{{ $noti_order }}</span>
                @endif
         </span>
        </a>
    </li>

    <li class="nav-item {{ Route::currentRouteName() == 'users.all-order-details.index' || Route::currentRouteName() == 'users.all-order-details.details' ||
    Route::currentRouteName() == 'users.all-order-details.search' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('users.all-order-details.index') }}">
            <i class="fa fa-book"></i>
            <span>รายละเอียดการใช้บริการทั้งหมด</span></a>
    </li>

</ul>
