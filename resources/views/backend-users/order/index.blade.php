@extends('backend-users.layouts.main_dashboard')
@section('title', 'ใช้บริการ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('เรียกใช้บริการ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.order.post') }}" style="padding: 40px">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>ที่อยู่ <span style="color:red">*</span></label>
                                    <textarea class="form-control"  name="address"
                                              placeholder="กรอกที่อยู่"
                                              rows="4">{{ Auth::user()->address }}</textarea>
                                    @if ($errors->has('address'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pay" class="text-md-right">ชำระเงินโดยการส่งหลักฐานการโอนเงิน<span style="color: red">*</span></label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        เรียกใช้บริการ
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
{{--@push('script')--}}
{{--    <script type="text/javascript">--}}

{{--        function readProduct(input) {--}}
{{--            if (input.files[0]) {--}}
{{--                var reader = new FileReader();--}}
{{--                reader.onload = function (e) {--}}
{{--                    $('#previewProduct').attr('src', e.target.result);--}}
{{--                };--}}
{{--                reader.readAsDataURL(input.files[0]);--}}
{{--            }--}}
{{--        }--}}

{{--    </script>--}}

{{--@endpush--}}
