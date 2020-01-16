<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() == 'admin.index' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>
{{--@if(auth()->user()->role_id == 1)--}}
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->role_id == 1)
    <li class="nav-item {{ Route::currentRouteName() == 'admin.employee.index'|| Route::currentRouteName() == 'admin.users.index' ||
    Route::currentRouteName() == 'admin.employee.create' || Route::currentRouteName() == 'admin.employee.edit' ||
    Route::currentRouteName() == 'admin.users.create' || Route::currentRouteName() == 'admin.users.edit' ||
    Route::currentRouteName() == 'admin.users.search' || Route::currentRouteName() == 'admin.employee.search' ? 'active' : null }} ">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-one" aria-expanded="true"
           aria-controls="collapse-one">
            <i class="fas fa-users"></i>
            <span>ข้อมูลสมาชิก</span>
        </a>
        <div id="collapse-one" class="collapse {{ Route::currentRouteName() == 'admin.employee.index' || Route::currentRouteName() == 'admin.users.index'||
          Route::currentRouteName() == 'admin.employee.create' || Route::currentRouteName() == 'admin.employee.edit' ||
          Route::currentRouteName() == 'admin.users.create' || Route::currentRouteName() == 'admin.users.edit' ||
          Route::currentRouteName() == 'admin.users.search' || Route::currentRouteName() == 'admin.employee.search' ? 'show' : null  }}"
             aria-labelledby="heading-one" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded ">
                {{--<h6 class="collapse-header">Custom Components:</h6>--}}
                <a class="collapse-item fas fa-user-tie {{ Route::currentRouteName() == 'admin.employee.index' || Route::currentRouteName() == 'admin.employee.create' ||
                 Route::currentRouteName() == 'admin.employee.edit' || Route::currentRouteName() == 'admin.employee.search' ? 'active' : null  }}" href="{{ route('admin.employee.index') }}">  ข้อมูลพนักงาน</a>
                <a class="collapse-item fas fa-user {{ Route::currentRouteName() == 'admin.users.index' || Route::currentRouteName() == 'admin.users.create' ||
                 Route::currentRouteName() == 'admin.users.edit' || Route::currentRouteName() == 'admin.users.search' ? 'active' : null  }}" href="{{ route('admin.users.index') }}">  ข้อมูลสมาชิก</a>
            </div>
        </div>
    </li>
    @endif

{{--    @if(auth()->user()->role_id == 1 )--}}
{{--        <li class="nav-item {{ Route::currentRouteName() == 'admin.confirm-package.index' || Route::currentRouteName() == 'admin.confirm-package.create' ||--}}
{{--      Route::currentRouteName() == 'admin.confirm-package.edit' ? 'active' : null }}">--}}
{{--            <a class="nav-link" href=" {{ route('admin.confirm-package.index') }}" data-toggle="collapse show" data-target="#collapse25" aria-expanded="true"--}}
{{--               aria-controls="collapse25">--}}
{{--                <i class="fas fa-dumpster"></i>--}}
{{--                <span>ยืนยันการซื้อแพ็คเกจ</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endif--}}

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <li class="nav-item {{ Route::currentRouteName() == 'admin.service-type.index' || Route::currentRouteName() == 'admin.service-type.create' ||
      Route::currentRouteName() == 'admin.service-type.edit' || Route::currentRouteName() == 'admin.service-type.search' ? 'active' : null }}">
            <a class="nav-link" href=" {{ route('admin.service-type.index') }}" data-toggle="collapse show" data-target="#collapse-two" aria-expanded="true"
               aria-controls="collapse-two">
                <i class="fas fa-pencil-alt"></i>
                <span>ประเภทบริการ</span>
            </a>
        </li>
    @endif

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
    <li class="nav-item {{ Route::currentRouteName() == 'admin.clothes.index' || Route::currentRouteName() == 'admin.clothes.create' ||
      Route::currentRouteName() == 'admin.clothes.edit' || Route::currentRouteName() == 'admin.clothes.search'? 'active' : null }}">
        <a class="nav-link" href=" {{ route('admin.clothes.index') }}" data-toggle="collapse show" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-dumpster"></i>
            <span>เสื้อผ้า</span>
        </a>
    </li>
    @endif

{{--    @if(auth()->user()->role_id == 1 )--}}
{{--        <li class="nav-item {{ Route::currentRouteName() == 'admin.package.index' || Route::currentRouteName() == 'admin.package.create' ||--}}
{{--      Route::currentRouteName() == 'admin.package.edit' ? 'active' : null }}">--}}
{{--            <a class="nav-link" href=" {{ route('admin.package.index') }}" data-toggle="collapse show" data-target="#collapse21" aria-expanded="true"--}}
{{--               aria-controls="collapse21">--}}
{{--                <i class="fas fa-dumpster"></i>--}}
{{--                <span>แพ็คเกจ</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endif--}}

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
        <li class="nav-item {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
        Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||
        Route::currentRouteName() == 'admin.order.search' ? 'active' : null }} ">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-three" aria-expanded="true"
               aria-controls="collapse-three">
                <i class="fas fa-calendar-alt"></i>
                <span>บริการลูกค้า</span>
            </a>
            <div id="collapse-three" class="collapse {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
            Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' || Route::currentRouteName() == 'admin.order.search' ? 'show' : null }}" aria-labelledby="heading-three" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
                    Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||
                    Route::currentRouteName() == 'admin.order.search' ? 'active' : null }}" href="{{ route('admin.order.index') }}">บริการของลูกค้า</a>
                </div>
            </div>
        </li>
    @endif

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
    <li class="nav-item {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details' ||
    Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'active' : null }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-four" aria-expanded="true"
           aria-controls="collapse-four">
            <i class="fas fa-file-alt"></i>
            <span>รายงานการใช้บริการ</span>
        </a>
        <div id="collapse-four" class="collapse {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'
        || Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'show' : null }}" aria-labelledby="heading-four" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details'? 'active' : null }}" href="{{ route('admin.order-details-daily.index') }}">รายงานการใช้บริการรายวัน</a>
                <a class="collapse-item {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'? 'active' : null }}" href="{{ route('admin.order-details.index') }}">รายงานทั้งหมด</a>
            </div>
        </div>
    </li>
    @endif

{{--    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-five" aria-expanded="true"--}}
{{--           aria-controls="collapse-five">--}}
{{--            <i class="fas fa-bell"></i>--}}
{{--            <span>การแจ้งเตือน</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    @endif--}}
    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <p class="topic-white-size15">หน้าเว็บ</p>
    </div>
    @endif

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <li class="nav-item {{ Route::currentRouteName() == 'admin.article-category.index' || Route::currentRouteName() == 'admin.article-category.create' ||
      Route::currentRouteName() == 'admin.article-category.edit' ? 'active' : null }}">
            <a class="nav-link" href=" {{ route('admin.article-category.index') }}" data-toggle="collapse show" data-target="#collapse4" aria-expanded="true"
               aria-controls="collapse4">
                <i class="fas fa-pencil-alt"></i>
                <span>ประเภทข่าวสาร</span>
            </a>
        </li>
    @endif

    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <li class="nav-item {{ Route::currentRouteName() == 'admin.articles.index' || Route::currentRouteName() == 'admin.articles.create' ||
      Route::currentRouteName() == 'admin.articles.edit' || Route::currentRouteName() == 'admin.articles.search' ? 'active' : null }}">
            <a class="nav-link" href=" {{ route('admin.articles.index') }}" data-toggle="collapse show" data-target="#collapse7" aria-expanded="true"
               aria-controls="collapse7">
                <i class="far fa-clipboard"></i>
                <span>ข่าวสาร</span>
            </a>
        </li>
    @endif

    @if(auth()->user()->role_id == 1)
        <li class="nav-item {{ Route::currentRouteName() == 'admin.promotion.index' || Route::currentRouteName() == 'admin.promotion.create' ||
      Route::currentRouteName() == 'admin.promotion.edit' ? 'active' : null }}">
            <a class="nav-link" href=" {{ route('admin.promotion.index') }}" data-toggle="collapse show" data-target="#collapse5" aria-expanded="true"
               aria-controls="collapse5">
                <i class="fas fa-dumpster"></i>
                <span>โปรโมชั่น</span>
            </a>
        </li>
    @endif
</ul>