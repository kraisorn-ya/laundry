@extends('admin.layouts-admin.main_dashboard')
@section('title', 'หลักฐานชำระเงิน')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('หลักฐานชำระเงิน') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <p>คุณ:  {{ $orders->users->first_name." ".$orders->users->last_name }}</p>
                            <p>เบอร์โทร:  {{ $orders->users->tel}}</p>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>ที่อยู่</label>
                                <textarea class="form-control" name="address"
                                          placeholder="Short Description"
                                          rows="4" disabled>{{ $orders->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
{{--                                <label for="pay" class="text-md-right">วิธีชำระ :</label>--}}
{{--                                <p>  {{ $orders->pay }}</p>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label >หลักฐานชำระเงิน<span style="color:red">*</span></label>
                            <div class="form-group">
                                <div id="divShowImg">
                                    @if($orders->image)
                                        <img class="img-thumbnail" id="previewProduct" style="width: 160px; height: 160px" src="{{ asset('storage/'.$orders->image) }}">
                                    @elseif($orders->image == null)
                                        <img class="img-thumbnail" id="previewProduct" style="width: 150px; height: 160px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5 offset-5">
                            <form method="post" action="{{ route('admin.manage-status.payStatus', $orders->id) }}">
                                @csrf
                                <button class="btn btn-success" type="submit" style="height: 40px;">
                                    ยืนยันการชำระเงิน
                                </button>
                            </form>
                            <a class="btn btn-danger" href="{{ route('admin.manage-status.index') }}" style="height: 40px; width: 100px">ยังไม่ชำระ</a>
                        </div>
                    </div>
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
