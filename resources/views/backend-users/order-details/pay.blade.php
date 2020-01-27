@extends('backend-users.layouts.main_dashboard')
@section('title', 'ชำระเงิน')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('ชำระเงิน') }}</div>
            <form method="post" action="{{ route('users.order-details.update',$orders->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <p>คุณ: {{ $orders->users->first_name." ".$orders->users->last_name }}</p>
                        <div class="form-group" style="margin-left: 40%">
                            <p>ยอดที่ต้องชำระ {{ $orders->total_price }}</p>
                            <label>กรุณาใส่หลักฐานการโอนเงิน<span style="color: red">*</span></label>
                            <div class="form-group">
                                <div id="divShowImg">
                                    <img class="img-thumbnail" id="previewProduct" style="width: 160px; height: 160px"
                                         src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                </div>

                                @if ($errors->has('image'))
                                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                @endif

                            </div>
                            <input type="file" accept="image/jpeg, image/png" onchange="readProduct(this);"
                                   id="fileProduct"
                                   name="image" value="{{ old('image') }}">
                            <p class="help-block">
                                ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                                ขนาดไฟล์ไม่เกิน 1 MB <br>
                            </p>

                        </div>

                        <div class="form-group row mb-5 offset-5">
                            <button class="btn btn-success" type="submit" style="height: 40px;">
                                ยืนยันการชำระเงิน
                            </button>
                            <a class="btn btn-danger" href="{{ route('users.order-details.index') }}"
                               style="height: 40px; width: 100px">กลับ</a>
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
