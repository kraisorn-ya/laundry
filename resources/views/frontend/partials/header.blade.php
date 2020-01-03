<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <a class="topic5" href="{{ url('/index4') }}">ร้านซักรีดออนไลน์</a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
            {{--            <a href="#intro" class="scrollto"><img src="{{ asset('newbiz/img/logo.png') }}" alt="" class="img-fluid"></a>--}}
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
{{--                <li><a href="#intro">หน้าแรก</a></li>--}}
                <li><a  class="{{ Route::currentRouteName() == 'laundry.index' ? 'active' : null }}"  href="{{ route('laundry.index') }}">หน้าแรก</a></li>
{{--                <li><a href="#about">เกี่ยวกับ</a></li>--}}
{{--                <li><a href="#services">โปรโมชั่น</a></li>--}}
                {{--<li><a href="#portfolio">Portfolio</a></li>--}}
{{--                <li><a href="#contact">ติดต่อเรา</a></li>--}}
                <li><a class="{{ Route::currentRouteName() == 'laundry.articles.index' ? 'active' : null }}" href="{{ route('laundry.articles.index')}}" >ข่าวสาร</a></li>
                <li><a class="{{ Route::currentRouteName() == 'laundry.service-charge.index' ? 'active' : null }}" href="{{ route('laundry.service-charge.index')}}" >ค่าบริการ</a></li>
                <li><a class="{{ Route::currentRouteName() == 'laundry.contact-us.index'||Route::currentRouteName() == 'laundry.articles.content' ? 'active' : null }}" href="{{ route('laundry.contact-us.index') }}">ติดต่อเรา</a></li>
                <li><a class="{{ Route::currentRouteName() == 'register' ? 'active' : null }}" href="{{ route('register') }}">สมัครสมาชิก</a></li>
                {{--<li><a href="#contact">เข้าสู่ระบบ</a></li>--}}
                @if (Route::has('login'))
                        @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        @endauth
                @endif
            </ul>
        </nav><!-- .main-nav -->
    </div>
</header><!-- #header -->