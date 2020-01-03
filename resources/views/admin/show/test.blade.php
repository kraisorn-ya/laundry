@extends('admin.layouts.main_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('กลุ่มเสื้อผ้าที่ซักแยกกัน') }}</div>

                    <div class="card-body">
                        <form method="POST" action="#" style="padding: 40px">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อกล้าม" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อแขนสั้น" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อยืด แขนสั้น/ยาว" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="กางเกง ขายาว/ กระโปรงยาว" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header">{{ __('กลุ่มเสื้อผ้าที่ซักรวมกัน') }}</div>

                    <div class="card-body">
                        <form method="POST" action="#" style="padding: 40px">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อกล้าม" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อแขนสั้น" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="เสื้อยืด แขนสั้น/ยาว" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ชนิดเสื้อผ้า:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" placeholder="กางเกง ขายาว/ กระโปรงยาว" value="{{ old('username') }}" required autofocus>
                                    <div class="form-group">
                                        <label for="gender" class="text-md-right"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('จำนวน:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" class="col-form-label text-md-right">{{ __('ราคา/ชิ้น:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2 offset-8">
                                    <label>ราคาสุทธิ : 30 บาท</label>
                                </div>
                            </div>
                            <div class="form-group row mb-0 offset-md-3">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        บันทึก
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        ยกเลิก
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection