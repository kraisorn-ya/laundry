@extends('admin.layouts.main_dashboard')
@section('title', 'Edit Employee')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('แก้ไขข้อมูลพนักงาน') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.employee.update',[array_get($data,'id')]) }}" style="padding: 40px" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>รูปโปร์ไฟล์</label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <a id="linkProduct"
                                           href="{{ ($data->image == 'NULL') ? '' : asset('storage/'.$data->image) }}"
                                           target="blank">
                                            <img class="rounded-circle" id="previewProduct" style="width: 160px;height: 160px"
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

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชื่อผู้ใช้ :') }}</label>

                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ $data->username }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="password" class="col-form-label text-md-right">{{ __('รหัสผ่าน :') }}</label>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" autofocus>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน :') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="col-form-label text-md-right">อีเมล :</label>

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $data->email }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name" class="col-form-label text-md-right">{{ __('ชื่อ :') }}</label>

                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ $data->first_name }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name" class="col-form-label text-md-right">{{ __('นามสกุล :') }}</label>

                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ $data->last_name }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="text-md-right">  เพศ :</label>

                                <select name="gender" class="form-control col-md-1" >
                                    <option value="ช" {{ ('ช' == $data->gender)? 'selected':'' }}>ช</option>
                                    <option value="ญ" {{ ('ญ' == $data->gender)? 'selected': '' }}>ญ</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_card" class="col-form-label text-md-right">เลขบัตรประชาชน :</label>

                                    <input id="id_card" type="text" class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}"
                                           name="id_card" value="{{ $data->id_card }}" required autofocus>

                                    @if ($errors->has('id_card'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_card') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tel" class="col-form-label text-md-right">เบอร์โทรศัพท์ :</label>

                                    <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                           name="tel" value="{{ $data->tel }}" required autofocus>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="birthday" class="col-form-label text-md-right">วันเกิด :</label>

                                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                           name="birthday" value="{{ $data->birthday }}" required autofocus>

                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="address" class="col-form-label text-md-right">ที่อยู่ :</label>

                                    <textarea rows="4" id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                              name="address" >{{ $data->address }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ตำแหน่ง</label>
                                <select class="form-control" name="role_id">

                                    @foreach ($roles as $role)
                                        <option
                                                value="{{ $role->id }}" {{ $data->role_id == $role->id ? "selected":"" }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                    @if ($errors->has('role_id'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                    @endif
                                </select>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>ตำแหน่ง </label>--}}
{{--                                <select class="form-control" name="role_id">--}}
{{--                                    @foreach ($roles as $role)--}}
{{--                                        <option--}}
{{--                                                {{ (old("role_id") == $role->id ? "selected":"") }} value="{{ $role->id }}">{{ $role->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="form-group col-md-12">--}}
{{--                                    <label for="salary" class="col-form-label text-md-right">Salary :</label>--}}

{{--                                    <input id="salary" type="text" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}"--}}
{{--                                           name="salary" value="{{ $data->salary }}"  autofocus>--}}

{{--                                    @if ($errors->has('salary'))--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('salary') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        บันทึก
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('admin.employee.index') }}">กลับ</a>
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
            }
            else {
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

        new Cleave('#id_card',{
            blocks: [1, 4, 5, 2, 1],
            numericOnly: true,
        });

        //    new Cleave('#salary',{
        //        numeral: true,
        //        numeralThousandsGroupStyle: 'thousand'
        //    });
    </script>

@endpush

