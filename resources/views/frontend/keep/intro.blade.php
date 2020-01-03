<section id="intro" class="clearfix">
    <div class="container">
        <div class="intro-img">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @else
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row offset-md-1">
                                <div class="col">

                                </div>
                                <label for="username" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('ชื่อผู้ใช้ :') }}</label>
                                <div class="col-md-4">
                                    <input id="username" type="text" autocomplete="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"  autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row offset-md-1">
                                <div class="col">

                                </div>
                                <label for="password" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('รหัสผ่าน :') }}</label>

                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0 offset-md-8" style="padding-left: 4%">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endauth
                </div>
            @endif
            <img src="{{ asset('newbiz/img/laundry1.png') }}" alt="" class="img-fluid">
        </div>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link " href="#">ทั้งหมด</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">โปรโมชั่น</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles') }}" tabindex="-1" aria-disabled="true">ข่าวสาร</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $promotion->title }}</h5>
                <p class="card-text">{!! $promotion->description !!} </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h6 class="topic4">โปรโมชั่น</h6>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <blockquote class="blockquote mb-0">--}}
{{--                    <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">--}}
{{--                        <div class="box">--}}
{{--                            <div class="icon"><i style="color:#41cf2e;"></i></div>--}}
{{--                            <h4 class="title topic4"><a href="">โปรโมชั่นรายเดือน</a></h4>--}}
{{--                            <p class="description topic4">ซักเกิน 90 กิโลขึ้นไปมีส่วนลด 5 %</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </blockquote>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</section><!-- #intro -->