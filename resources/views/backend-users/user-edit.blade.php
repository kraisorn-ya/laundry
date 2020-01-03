@extends('backend-users.layouts.main_dashboard')
@section('title', 'EditProfile')
@section('content')
    <div class="container" style="margin-top: 5%">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('users.update',[array_get($data,'id')]) }}" style="padding: 40px"
                  enctype="multipart/form-data">
                @csrf
                <div class="card mb-5" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>รูปโปร์ไฟล์</label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <a id="linkProduct"
                                           href="{{ ($data->image == 'NULL') ? '' : asset('storage/'.$data->image) }}"
                                           target="blank">
                                            <img class="card-img" id="previewProduct" style="width: 160px;height: 160px"
                                                 src="{{ ($data->image == 'NULL') ? 'https://via.placeholder.com/180x120.png?text=No%20Image'
                                     : asset('storage/'.$data->image) }}">
                                        </a>
                                        <div style="margin-left: 8rem"><input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()"></div>

                                        @if ($errors->has('image'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <input  type="file" accept="image/jpeg, image/png" onchange="readProduct(this);" id="fileProduct"
                                        name="image">
                                <p class="help-block" style="font-size: 14px">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                                    ขนาดไฟล์ไม่เกิน 1 MB <br>
                                </p>
                            </div>
{{--                            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img" alt="...">--}}
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title topic-red">ข้อมูลส่วนตัว</p>
                                <div class="form-row">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-form-label text-md-right"
                                               style="margin-left: 20%">{{ __('ชื่อ :') }}</label>
                                        <div class="col-md-8">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ $data->first_name }}" required autofocus>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-form-label text-md-right"
                                               style="margin-left: 8%">{{ __('นามสกุล:') }}</label>
                                        <div class="col-md-8">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ $data->last_name }}" required autofocus>

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-form-label" style="margin-left: 5%">ที่อยู่
                                        :</label>
                                    <div class="col-md-8">
                                        <input id="address" type="text"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" value="{{ $data->address  }}" autofocus>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label text-md-right" style="margin-left: 4%">อีเมล
                                        :</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $data->email }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tel" class="col-form-label text-md-right">เบอร์โทร :</label>
                                    <div class="col-md-8">
                                        <input id="tel" type="text"
                                               class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                               name="tel" value="{{ $data->tel }}" required autofocus>

                                        @if ($errors->has('tel'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="text-md-right" style="margin-left: 7%">เพศ:</label>
                                    <div>
                                        <select name="gender" class="form-control" style="margin-left: 5%">
                                            <option value="ช" {{ ('ช' == $data->gender)? 'selected':'' }}>ช</option>
                                            <option value="ญ" {{ ('ญ' == $data->gender)? 'selected': '' }}>ญ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-white">
                        <div class="form-group row">
                            <label for="id_card" class="col-form-label text-md-right">บัตรประชาชน :</label>
                            <div class="col-md-4">
                                <input id="id_card" type="text"
                                       class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}"
                                       name="id_card" value="{{ $data->id_card }}" required autofocus>

                                @if ($errors->has('id_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="birthday" class="col-form-label text-md-right" style="margin-left: 5%">วันเกิด
                                :</label>
                            <div class="col-md-4">
                                <input id="birthday" type="date"
                                       class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                       name="birthday" value="{{ $data->birthday }}" required autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username"
                                       class="col-form-label text-md-right">{{ __('Username :') }}</label>

                                <input id="username" type="text"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username" value="{{ $data->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="password"
                                       class="col-form-label text-md-right">{{ __('รหัสผ่าน :') }}</label>

                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password-confirm"
                                       class="col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน :') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">

        function readProduct(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#falseinput').attr('src', e.target.result);
                    $('#previewProduct').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#linkProduct').removeAttr('href');
            }
        }

        function clearProduct() {
            var image = '{{ $data->image }}';
            if (image == 'NULL') {
                $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            } else {
                $('#previewProduct').attr('src', "{{ asset('storage/'.$data->image) }}");
                $('#linkProduct').attr('href', "{{ asset('storage/'.$data->image) }}");
            }
            $('#fileProduct').val(null);
        }

        new Cleave('#tel', {
            phone: true,
            delimiter: '-',
            phoneRegionCode: 'TH'
        });

        new Cleave('#id_card', {
            blocks: [1, 4, 5, 2, 1],
            numericOnly: true,
        });
    </script>
@endpush


