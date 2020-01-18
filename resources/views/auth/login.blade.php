@extends('layouts.app')

@section('content')
    <div class="limiter" style="margin-top: -3%">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{ asset('img/bg-user02.png') }}); height: 250px">
                    <span class="login100-form-title-1" style="margin-top: 20%">Login</span>
                </div>
                <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100 form-control @error('username') is-invalid @enderror" id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Enter username">
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif

                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
