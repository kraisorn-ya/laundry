@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group" style="margin-left: 40%">
                            <label >รูปโปรไฟล์</label>
                            <div class="form-group">
                                <div id="divShowImg">
                                    <img class="rounded-circle" id="previewProduct" style="width: 160px; height: 160px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                </div>

                                @if ($errors->has('image'))
                                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                @endif

                            </div>
                            <input type="file" accept="image/jpeg, image/png"  onchange="readProduct(this);" id="fileProduct"
                                   name="image">
                            <p class="help-block">
                                ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                                ขนาดไฟล์ไม่เกิน 1 MB <br>
                            </p>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username" class="col-form-label text-md-right">{{ __('Username :') }}</label>

                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password :') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password :') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-right">E-Mail Address :</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label text-md-right">{{ __('First Name :') }}</label>

                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                       name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label text-md-right">{{ __('Last Name :') }}</label>

                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                       name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="text-md-right">  Gender :</label>

                            <select name="gender" class="form-control col-md-1" >
                                <option value="ช">ช</option>
                                <option value="ญ">ญ</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_card" class="col-form-label text-md-right">ID_Card :</label>

                                <input id="id_card" type="text" class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}"
                                       name="id_card" value="{{ old('id_card') }}" required autofocus>

                                @if ($errors->has('id_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tel" class="col-form-label text-md-right">Tel :</label>

                                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                       name="tel" value="{{ old('tel') }}" required autofocus>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="birthday" class="col-form-label text-md-right">BirthDay :</label>

                                <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                       name="birthday" value="{{ old('birthday') }}" required autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="address" class="col-form-label text-md-right">Address :</label>

                                <textarea rows="4" id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                          name="address" value="{{ old('address') }}" required autofocus></textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <a class="btn btn-danger" href="{{ url('index4') }}">back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script type="text/javascript">

        function readProduct(input) {
            if (input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        new Cleave('#tel', {
            phone: true,
            delimiter: '-',
            phoneRegionCode: 'TH'
        });

        new Cleave('#id_card',{
            blocks: [1, 4, 5, 2, 1],
            numericOnly: true,
        });
    </script>
@endpush
