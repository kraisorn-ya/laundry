@extends('backend-users.layouts.main_dashboard')
@section('title', 'รายการเสื้อผ้า')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header text-header col-md-5">รายการเสื้อผ้า</div>
                <div class="card" style="margin-top: 10px">

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">วันที่ใช้บริการ</th>
                            <th scope="col">วันที่จะเสร็จ</th>
                            <th scope="col">ยอดที่ต้องชำระ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">สถานะชำระเงิน</th>
                            <th scope="col">วิธีการชำระเงิน</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>{{ $order->date_completed }}</td>
                                <td>{{ $order->total_price }}</td>

                                @if($order->order_status == 0)
                                    <td>กำลังไปรับเสื้อผ้า</td>
                                @elseif($order->order_status == 1)
                                    <td>รับเสื้อผ้าเรียบร้อย</td>
                                @elseif($order->order_status == 2)
                                    <td>กำลังดำเนินการ</td>
                                @elseif($order->order_status == 3)
                                    <td>ซักเสร็จแล้วรอชำระเงิน</td>
                                @elseif($order->order_status == 4)
                                    <td>กำลังจัดส่ง</td>
                                @elseif($order->order_status == 5)
                                    <td>เสร็จสิ้น</td>
                                @endif

                                @if($order->pay_status == 0)
                                    <td>ยังไม่ชำระ</td>
                                @elseif($order->pay_status == 1)
                                    <td>รอการตรวจสอบการชำระ</td>
                                @elseif($order->pay_status == 2)
                                    <td>ชำระแล้ว</td>
                                @endif

                                @if($order->payment == 0)
                                    <td>ชำระปลายทาง</td>
                                @elseif($order->payment == 1)
                                    <td>ชำระโดยการส่ง<br>หลักฐานการโอนเงิน</td>
                                @endif

{{--                                @if($order->send_status == null)--}}
{{--                                    <td></td>--}}
{{--                                @elseif($order->send_status == 0)--}}
{{--                                    <td>ยังไม่จัดส่งเสื้อผ้า</td>--}}
{{--                                @elseif($order->send_status == 1)--}}
{{--                                    <td>จัดส่งเสื้อผ้า</td>--}}
{{--                                @endif--}}

                                @if($order->order_status != 0)
                                <td class="row">
                                    <a class="btn btn-primary" href="{{ route('users.order-details.details', $order->id) }}">
                                        <i class="fa fa-book"> ดูรายละเอียด</i>
                                    </a>
                                    @if($order->payment != 0)
                                    <a class="btn btn-info" href="{{ route('users.order-details.pay', $order->id) }}">
                                        <i class="fab fa-amazon-pay"></i>
                                    </a>
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

