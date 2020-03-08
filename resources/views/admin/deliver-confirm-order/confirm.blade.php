@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายการเสื้อผ้าของลูกค้า')
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="card-header font-order col-md-4">รายการเสื้อผ้าของคุณ: {{ $orders->users->first_name." ".$orders->users->last_name  }}</div>
{{--                <div class="card-header font-order col-md-4">วันที่เสร็จ {{ $order_date  }}</div>--}}
            </div>
            @if(session()->has('edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                    {{ session()->get('edit') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session()->has('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px">
                    {{ session()->get('deleted') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table">
                <thead>
                <tr class="bg-info">
                    <th scope="col" class="font-order">ลำดับ</th>
                    <th scope="col" class="font-order">ประการใช้บริการ</th>
                    <th scope="col" class="font-order">ชื่อเสื้อผ้า</th>
                    <th scope="col" class="font-order">ราคา(ต่อชิ้น)</th>
                    <th scope="col" class="font-order">จำนวน</th>
                    <th scope="col" class="font-order">ราคารวม</th>
                    <th scope="col" class="font-order">action</th>
                    <th scope="col" class="font-order"></th>
                </tr>
                </thead>
<!--                --><?php //$i = 1; ?>
                @foreach($order_details as $order_detail)
                    <tbody>
                    <tr>
                        <th scope="row" class="font-order">{{ $order_detail->id }}</th>
                        <td class="font-order">{{ $order_detail->service_type->name }}</td>
                        <td class="font-order">{{ $order_detail->clothes['name'] }}</td>
                        <td class="font-order">{{ $order_detail->clothes['price'] }}</td>
                        <form method="post" action="{{ route('admin.confirm-order.edit') }}">
                            @csrf
                            <td class="font-order" width="100px">
                                <input name="clothes_qty" type="number" min="1" class="form-control" value="{{ $order_detail->clothes_qty }}">
                                <input type="hidden" name="clothes_price" value="{{ $order_detail->clothes->price }}">
                                <input type="hidden" name="clothes_total_price" value="{{ $order_detail->orders->total_price }}">
                                <input type="hidden" name="total_qty" value="{{ $order_detail->orders->total_qty }}">
                                <input type="hidden" name="id" value="{{ $order_detail->id }}">
                                <input type="hidden" name="order_id" value="{{ $order_detail->orders->id }}">
                            </td>
                            <td class="font-order">{{ $order_detail['clothes_total_price'] }}</td>
                            <td width="50px">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-info">
                                        <i class="fas fa-trash">แก้ไข</i>
                                    </button>
                                </div>
                            </td>
                            @method('put')
                        </form>
                        <td class="font-order">
                            <form method="post" action="{{ route('admin.confirm-order.delete', $order_detail->id) }}">
                                @csrf
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-danger" onclick="return deleletconfig()">
                                        <i class="fas fa-trash">ลบรายการนี้</i>
                                    </button>
                                </div>
                                @method('delete')
                            </form>
                        </td>
                    </tr>
<!--                    --><?php //$i++ ?>
                    </tbody>
                @endforeach
                <tr class="bg-info">
                    <th scope="row" colspan="4" class="font-order"></th>
                    <td class="font-order">จำนวนรวม</td>
                    <td class="font-order">ราคารวมทั้งหมด</td>
                    <td class="font-order"></td>
                    <td class="font-order"></td>
                </tr>
                <tr>
                    <th scope="row" colspan="4" class="font-order"></th>
                    <th scope="row" class="font-order">{{ $orders->total_qty }}</th>
                    <th scope="row" class="font-order">{{ $orders->total_price }}</th>
                </tr>
            </table>
        </div>
        <form method = "post" action="{{ route('admin.confirm-order.orderStatus',[$orders->id]) }}">
            @csrf
            <div class="form-group row mb-0 col-md-12">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        ยืนยันรายการเสื้อผ้า
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.confirm-order.index') }}">กลับ</a>
                </div>
            </div>
            @method('put')
        </form>
    </div>
@endsection
@push('script')
    <script>
        function deleletconfig(){

            var del=confirm("คุณแน่ใจหรือไม่ จะลบรายการนี้");
            if (del==true){
                alert ("ลบรายการเรียบร้อยแล้ว")
            }else{
                alert("ยกเลิกการลบ")
            }
            return del;
        }
    </script>
@endpush
