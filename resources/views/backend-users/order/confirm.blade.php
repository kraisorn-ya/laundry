@extends('backend-users.layouts.main_dashboard')
@section('title', 'ยืนยันการใช้บริการ')
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="card-header font-order col-md-4">คุณ {{ Auth::user()->first_name." ".Auth::user()->last_name  }}</div>
                <div class="card-header font-order col">ที่อยู่ {{ $address  }}</div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr class="bg-info">
                    <th scope="col" class="font-order">ลำดับ</th>
                    <th scope="col" class="font-order">ชื่อเสื้อผ้า</th>
                    <th scope="col" class="font-order">ราคา(ต่อชิ้น)</th>
                    <th scope="col" class="font-order">จำนวน</th>
                    <th scope="col" class="font-order">ราคารวม</th>
                </tr>
                </thead>
                <?php $i = 1; ?>
                @foreach($order_details as $order_detail)
                    <tbody>
                    <tr>
                        <th scope="row" class="font-order">{{ $i }}</th>
                        <td class="font-order">{{ $order_detail['clothe_name'] }}</td>
                        <td class="font-order">{{ $order_detail['clothe_price'] }}</td>
                        <td class="font-order">{{ $order_detail['clothe_qty'] }}</td>
                        <td class="font-order">{{ $order_detail['clothe_total_price'] }}</td>
                    </tr>
                    <?php $i++ ?>
                    </tbody>
                @endforeach
                <tr class="bg-info">
                    <th scope="row" colspan="3" class="font-order"></th>
                    <td class="font-order">จำนวนรวม</td>
                    <td class="font-order">ราคารวมทั้งหมด</td>
                </tr>
                <tr>
                    <th scope="row" colspan="3" class="font-order"></th>
                    <td class="font-order">{{ $sum_qty }}</td>
                    <td class="font-order">{{ $sum_price }}</td>
                </tr>
            </table>
        </div>
        <form method="POST" action="{{ route('users.order.store') }}">
            @csrf
            <?php $i = 0 ?>
            @foreach($order_details as $order_detail)
                @foreach($order_detail as $key => $value)
                    <input type="hidden" name="{{ $i }}[{{ $key }}]" value="{{ $value }}">
                @endforeach
                <?php $i++?>
            @endforeach
            <input name="address" type="hidden" value="{{ $address  }}">
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        บันทึกรายการ
                    </button>
                    <a  href="#" class="btn btn-danger" onclick="history.go(-1)">กลับ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
