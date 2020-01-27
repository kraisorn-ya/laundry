@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายละเอียด')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header text-header">รายละเอียดเสื้อผ้า</div>
                <div class="card" style="margin-top: 10px">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อเสื้อผ้า</th>
                            <th scope="col">ชื่อประเภทบริการ</th>
                            <th scope="col">ราคา/ชิ้น</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคารวม</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $order_detail->id }}</td>
                                <td>{{ $order_detail->clothes->name }}</td>
                                <td>{{ $order_detail->service_type->name }}</td>
                                <td>{{ $order_detail->clothes->price }}</td>
                                <td>{{ $order_detail->clothes_qty }}</td>
                                <td>{{ $order_detail->clothes_total_price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr class="bg-dark">
                            <td colspan="4"></td>
                            <td class="text-details">จำนวนรวม</td>
                            <td class="text-details">ราคาสุทธิ</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td  class="pull-right ">{{ $order_detail->orders->total_qty }}</td>
                            <td class="pull-right ">{{ $order_detail->orders->total_price }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <a class="ิbtn btn-primary text-center" style="width: 98%;height:30px; margin-top: 10px" href="{{ route('admin.manage-status.index') }}">กลับ</a>
        </div>
    </div>

@endsection
