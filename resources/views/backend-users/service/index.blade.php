@extends('backend-users.layouts.main_dashboard')
@section('title', 'ใช้บริการ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('ใช้บริการ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.service.post') }}" style="padding: 40px" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>ประเภทการใช้บริการ <span style="color:red">*</span></label>
                                <select class="form-control" name="service_type_id">
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
                            <div class="box-body">
                                <div class="form-group">
                                    <label>ที่อยู่ <span style="color:red">*</span></label>
                                    <textarea class="form-control"  name="address"
                                              placeholder="Short Description"
                                              rows="4">{{ array_get($users,'0.address') }}</textarea>
                                    @if ($errors->has('address'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียด <span style="color:red">*</span></label>
                                    <textarea class="form-control ckeditor" id="editor" name="description"
                                              placeholder="Short Description"
                                              rows="4">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pay" class="text-md-right">  เลือกวิธีชำระ :</label>

                                <select name="pay" class="form-control col-md-6" >
                                    <option value="ชำระปลายทาง">ชำระปลายทาง</option>
                                    <option value="ชำระด้วยการส่งสลิปการโอนเงิน">ชำระด้วยการส่งสลิปการโอนเงิน</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >หากชำระด้วยการส่งสลิป กรุณาใส่รูปสลิป <span style="color:red">*</span></label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <img class="img-thumbnail" id="previewProduct" style="width: 160px; height: 160px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ใช้บริการ
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('home') }}">ยกเลิก</a>
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

    </script>

@endpush
