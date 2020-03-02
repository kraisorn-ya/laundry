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
                                <p>ข้อมูลลูกค้า</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth()->user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ route('admin.service-type.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.service-type.index' || Route::currentRouteName() == 'admin.service-type.create' ||
                Route::currentRouteName() == 'admin.service-type.edit' || Route::currentRouteName() == 'admin.service-type.search' ? 'active' : null }}">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>ประเภทบริการ</p>
                </a>
            </li>
            @endif

            @if(auth()->user()->role_id == 2)
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

{{--            @if(auth()->user()->role_id == 1)--}}
{{--            <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||--}}
{{--            Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' || Route::currentRouteName() == 'admin.order.search' ||--}}
{{--            Route::currentRouteName() == 'admin.order.detail' || Route::currentRouteName() == 'admin.order-status.index' || Route::currentRouteName() == 'admin.order-status.status' ||--}}
{{--            Route::currentRouteName() == 'admin.order-status.update' || Route::currentRouteName() == 'admin.order-status.detail' || Route::currentRouteName() == 'admin.order-status.delete' ? 'menu-open' : null }}">--}}
{{--                <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||--}}
{{--            Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||--}}
{{--            Route::currentRouteName() == 'admin.order.search' || Route::currentRouteName() == 'admin.order.detail' || Route::currentRouteName() == 'admin.order-status.index' ||--}}
{{--            Route::currentRouteName() == 'admin.order-status.status' || Route::currentRouteName() == 'admin.order-status.update' || Route::currentRouteName() == 'admin.order-status.detail' ||--}}
{{--            Route::currentRouteName() == 'admin.order-status.delete' ? 'active' : null }}">--}}
{{--                    <i class="nav-icon fas fa-calendar-alt "></i>--}}
{{--                    <p>--}}
{{--                        บริการลูกค้า--}}
{{--                        <i class="fas fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' || Route::currentRouteName() == 'admin.order.create' ||--}}
{{--                    Route::currentRouteName() == 'admin.order.delete' || Route::currentRouteName() == 'admin.order.confirm' ||--}}
{{--                    Route::currentRouteName() == 'admin.order.search' || Route::currentRouteName() == 'admin.order.detail' ? 'active' : null }}">--}}
{{--                            <i class=" nav-icon"></i>--}}
{{--                            <p>บริการของลูกค้า</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.order-status.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-status.index' || Route::currentRouteName() == 'admin.order-status.status' ||--}}
{{--                        Route::currentRouteName() == 'admin.order-status.update' || Route::currentRouteName() == 'admin.order-status.detail' || Route::currentRouteName() == 'admin.order-status.delete' ? 'active' : null }}">--}}
{{--                            <p>จัดการสถานะใช้บริการ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            @endif--}}

            @if(auth()->user()->role_id == 2)
                <li class="nav-item">
                    <a href="{{ route('admin.emp-confirm-order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.emp-confirm-order.index'
                    || Route::currentRouteName() == 'admin.emp-confirm-order.confirm' ? 'active' : null }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>ยืนยันรายการ</p>
                        <?php
                        $orders = \App\Order::query()
                            ->where('order_status','1')
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
            @endif

            @if(auth()->user()->role_id == 2)
                <li class="nav-item">
                    <a href="{{ route('admin.manage-status.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.manage-status.index' || Route::currentRouteName() == 'admin.manage-status.status' ||
                        Route::currentRouteName() == 'admin.manage-status.update' || Route::currentRouteName() == 'admin.manage-status.pay' || Route::currentRouteName() == 'admin.manage-status.delete' ||
                        Route::currentRouteName() == 'admin.manage-status.details' ? 'active' : null }}">
                        <i class="fas fa-edit"></i>
                        <p>จัดการสถานะใช้บริการ</p>
                        <?php
                        $orders = \App\Order::query()
                            ->where('order_status','!=','0')
                            ->where('order_status','!=','1')
                            ->where('order_status','!=','4')
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
            @endif

            @if(auth()->user()->role_id == 1)
            <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'
            || Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'menu-open ' : null }}">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details' ||
            Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details' ? 'active' : null }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        ดูรายละเอียดการใช้บริการ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.order-details-daily.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-details-daily.index' || Route::currentRouteName() == 'admin.order-details-daily.details'? 'active' : null }}">
                            <i class=" nav-icon"></i>
                            <p>ดูรายละเอียดการใช้บริการรายวัน</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.order-details.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-details.index' || Route::currentRouteName() == 'admin.order-details.details'? 'active' : null }}">
                            <i class=" nav-icon"></i>
                            <p>ดูรายละเอียดการใช้บริการทั้งหมด</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(auth()->user()->role_id == 2)
            <li class="nav-header">Front END</li>
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

            @if(auth()->user()->role_id == 2)
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

{{--            @if(auth()->user()->role_id == 1)--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.promotion.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.promotion.index' || Route::currentRouteName() == 'admin.promotion.create' ||--}}
{{--                        Route::currentRouteName() == 'admin.promotion.edit' ? 'active' : null }}">--}}
{{--                        <i class="nav-icon  fas fa-dumpster"></i>--}}
{{--                        <p>--}}
{{--                            โปรโมชั่น--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->role_id == 3)--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.deliver.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.deliver.index' || Route::currentRouteName() == 'admin.deliver.create' ||--}}
{{--                    Route::currentRouteName() == 'admin.deliver.delete' || Route::currentRouteName() == 'admin.deliver.confirm' ||--}}
{{--                    Route::currentRouteName() == 'admin.deliver.search' || Route::currentRouteName() == 'admin.deliver.detail' ? 'active' : null }}">--}}
{{--                        <i class="fas fa-clipboard-list"></i>--}}
{{--                        <p>บริการลูกค้า</p>--}}
{{--                        <?php--}}
{{--                        $orders = \App\Order::query()--}}
{{--                            ->where('order_status','0')--}}
{{--                            ->get();--}}
{{--                        $noti_order = count($orders);--}}
{{--                        ?>--}}
{{--                        <span>--}}
{{--                        @if( $noti_order != null)--}}
{{--                                <span class="badge badge-danger">{{ $noti_order }}</span>--}}
{{--                        @endif--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}


            @if(auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a href="{{ route('admin.confirm-order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.confirm-order.index'
                    || Route::currentRouteName() == 'admin.confirm-order.confirm' ? 'active' : null }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>ยืนยันรายการ</p>
                        <?php
                        $orders = \App\Order::query()
                            ->where('order_status','0')
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
            @endif

            @if(auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a href="{{ route('admin.order-success.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order-success.index' ||
                    Route::currentRouteName() == 'admin.order-success.dataCustomer' || Route::currentRouteName() == 'admin.order-success.details' ? 'active' : null }}">
                        <i class="fas fa-car"></i>
                        <p>เตรียมส่งเสื้อผ้า</p>
                        <?php
                        $orders = \App\Order::query()
                            ->where('order_status','!=','0')
                            ->where('order_status','=','4')
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
            @endif

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
