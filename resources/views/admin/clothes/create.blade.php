@extends('admin.layouts.main_dashboard')
@section('title', 'Create Clothes')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create clothes') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.clothes.store') }}" style="padding: 40px">
                            @csrf
                            <div class="form-group">
                                <label>ประเภทบริการ </label>
                                <select class="form-control col-md-3" name="service_type_id">
                                    <option selected disabled>กรุณาเลือกประเภทข่าวสาร</option>
                                    @foreach ($service_types as $service_type)
                                        <option
                                                {{ (old("service_type_id") == $service_type->id ? "selected":"") }} value="{{ $service_type->id }}">{{ $service_type->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('service_type_id'))
                                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('service_type_id') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label text-md-right">{{ __('ชื่อประเภทเสื้อผ้า :') }}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}"  autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price" class="col-form-label text-md-right">{{ __('ราคา(บาท)/ชิ้น :') }}</label>
                                    <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                           name="price" value="{{ old('price') }}"  autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-3 offset-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        บันทึก
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('admin.clothes.index') }}">ยกเลิก</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection