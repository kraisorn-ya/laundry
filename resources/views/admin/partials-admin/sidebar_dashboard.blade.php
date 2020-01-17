<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @if(auth()->user()->role_id == 1)
                <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin.employee.index' || Route::currentRouteName() == 'admin.users.index'||
                 Route::currentRouteName() == 'admin.employee.create' || Route::currentRouteName() == 'admin.employee.edit' ||
                 Route::currentRouteName() == 'admin.users.create' || Route::currentRouteName() == 'admin.users.edit' ||
                 Route::currentRouteName() == 'admin.users.search' || Route::currentRouteName() == 'admin.employee.search' ? 'menu-open' : null  }}">
                    <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.employee.index'|| Route::currentRouteName() == 'admin.users.index' ||
                     Route::currentRouteName() == 'admin.employee.create' || Route::currentRouteName() == 'admin.employee.edit' ||
                     Route::currentRouteName() == 'admin.users.create' || Route::currentRouteName() == 'admin.users.edit' ||
                     Route::currentRouteName() == 'admin.users.search' || Route::currentRouteName() == 'admin.employee.search' ? 'active' : null }}">
                        <i class="nav-icon fas fas fa-users"></i>
                        <p>
                            ข้อมูลสมาชิก
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.employee.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.employee.index' || Route::currentRouteName() == 'admin.employee.create' ||
                             Route::currentRouteName() == 'admin.employee.edit' || Route::currentRouteName() == 'admin.employee.search' ? 'active' : null  }}">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>ข้อมูลพนักงาน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.users.index' || Route::currentRouteName() == 'admin.users.create' ||
                             Route::currentRouteName() == 'admin.users.edit' || Route::currentRouteName() == 'admin.users.search' ? 'active' : null  }}">
                                <i class="far fa-user nav-icon"></i>
                                <p>ข้อมูลผู้ใช้</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ route('admin.service-type.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.service-type.index' || Route::currentRouteName() == 'admin.service-type.create' ||
                Route::currentRouteName() == 'admin.service-type.edit' || Route::currentRouteName() == 'admin.service-type.search' ? 'active' : null }}">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>ประเภทบริการ</p>
                </a>
            </li>
            @endif

            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
             <li class="nav-item">
             <a href="{{ route('admin.clothes.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.clothes.index' || Route::currentRouteName() == 'admin.clothes.create' ||
            Route::currentRouteName() == 'admin.clothes.edit' || Route::currentRouteName() == 'admin.clothes.search'? 'active' : null }}">
                     <i class="nav-icon fas fa-dumpster"></i>
                      <p>เสื้อผ้า</p>
                    </a>
                </li>
            @endif

{{--            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.package.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.package.index' || Route::currentRouteName() == 'admin.package.create' ||--}}
{{--                    Route::currentRouteName() == 'admin.package.edit' ? 'active' : null }}">--}}
{{--                        <i class="nav-icon fas fa-dumpster"></i>--}}
{{--                        <p>แพ็คเกจ</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.confirm-package.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.confirm-package.index' || Route::currentRouteName() == 'admin.confirm-package.create' ||--}}
{{--                     Route::currentRouteName() == 'admin.confirm-package.edit' ? 'active' : null }}">--}}
{{--                        <i class="nav-icon fas fa-dumpster"></i>--}}
{{--                        <p>ยืนยันการซื้อแพ็คเกจ</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
            Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' || Route::currentRouteName() == 'admin.order.search' ? 'menu-open' : null }}">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
            Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||
            Route::currentRouteName() == 'admin.order.search' ? 'active' : null }}">
                    <i class="nav-icon fas fa-calendar-alt "></i>
                    <p>
                        บริการลูกค้า
                        <i class="fas fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||
                    Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||
                    Route::currentRouteName() == 'admin.order.search' ? 'active' : null }}">
                            <i class=" nav-icon"></i>
                            <p>บริการของลูกค้า</p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="pages/forms/advanced.html" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Advanced Elements</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>
            @endif

            <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'
        || Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'menu-open ' : null }}">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details' ||
    Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'active' : null }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        รายงานการใช้บริการ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.order-details-daily.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details'? 'active' : null }}">
                            <i class=" nav-icon"></i>
                            <p>รายงานการใช้บริการรายวัน</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.order-details.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'? 'active' : null }}">
                            <i class=" nav-icon"></i>
                            <p>รายงานทั้งหมด</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-header">Front END</li>
{{--            <li class="nav-item">--}}
{{--                <a href="pages/calendar.html" class="nav-link">--}}
{{--                    <i class="nav-icon far fa-calendar-alt"></i>--}}
{{--                    <p>--}}
{{--                        Calendar--}}
{{--                        <span class="badge badge-info right">2</span>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a href="{{ route('admin.article-category.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.article-category.index' || Route::currentRouteName() == 'admin.article-category.create' ||
                 Route::currentRouteName() == 'admin.article-category.edit' ? 'active' : null }}">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        ประเภทข่าวสาร
                    </p>
                </a>
            </li>
            @endif

            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ route('admin.articles.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.articles.index' || Route::currentRouteName() == 'admin.articles.create' ||
                Route::currentRouteName() == 'admin.articles.edit' || Route::currentRouteName() == 'admin.articles.search' ? 'active' : null }}">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        ข่าวสาร
                    </p>
                </a>
            </li>
            @endif

            @if(auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('admin.promotion.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.promotion.index' || Route::currentRouteName() == 'admin.promotion.create' ||
                        Route::currentRouteName() == 'admin.promotion.edit' ? 'active' : null }}">
                        <i class="nav-icon  fas fa-dumpster"></i>
                        <p>
                            โปรโมชั่น
                        </p>
                    </a>
                </li>
            @endif

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>