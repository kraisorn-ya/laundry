@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายการเสื้อผ้าของลูกค้า')
@section('content')
    <div class="container">
        <div class="row" style="margin-left: 5%; margin-top: 2%">
            <div class="col-md-12">
                <h5 class="font-order">รายการเสื้อผ้าของคุณ : {{ $orders->users->first_name." ".$orders->users->last_name }}</h5>
                <div class="card" style="margin-top: 2%">
                    <div class="card-header bg-info">
                        <div class="row col-md-12">
                            <div class="col-md-1 text-color-black">
                                #
                            </div>
                            <div class="col-md-2 text-color-black">
                                ประเภทการใช้บริการ
                            </div>
                            <div class="col-md-2 text-color-black">
                                ชื่อเสื้อผ้า
                            </div>
                            <div class="col-md-1 text-color-black">
                                ราคา/ต่อชิ้น(บาท)
                            </div>
                            <div class="col-md-1 text-color-black">
                                จำนวน
                            </div>
                            <div class="col-md-1 text-color-black">
                                ราคารวม
                            </div>
                            <div class="col-md-1 text-color-black">
                                action
                            </div>
                        </div>
                    </div>
                    @foreach($order_details as $order_detail)
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="col-md-1">
                                    <p class="text-color-black">{{ $order_detail->id }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-color-black">{{ $order_detail->service_type->name }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-color-black">{{ $order_detail->clothes->name }}</p>
                                </div>
                                <div class="col-md-1">
                                    <p class="text-color-black">{{ $order_detail->clothes->price }}</p>
                                </div>
                                <div class="col-md-1">
                                    <p class="text-color-black">{{ $order_detail->clothes_total_price }}</p>
                                </div>
                                <form method="post" action="{{ route('admin.confirm-order.edit') }}">
                                    @csrf
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" min="1" name="clothes_qty" value="{{ $order_detail->clothes_qty }}">
                                    </div>
                                    @method('put')
                                </form>
                                <form method="post" action="{{ route('admin.confirm-order.delete', $order_detail->id) }}">
                                    @csrf
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fas fa-trash">ลบรายการนี้</i>
                                        </button>
                                    </div>
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row mb-0 col-md-12">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        ยืนยัน
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.confirm-order.index') }}">กลับ</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        function deleletconfig() {

            var del = confirm("คุณแน่ใจหรือไม่ จะลบใบสั่งนี้");
            if (del == true) {
                alert("ลบเรียบร้อยแล้ว")
            } else {
                alert("ยกเลิกการลบ")
            }
            return del;
        }
    </script>
@endpush
