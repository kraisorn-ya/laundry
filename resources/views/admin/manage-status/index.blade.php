@extends('admin.layouts-admin.main_dashboard')
@section('title', 'สถานะการใช้บริการ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 ">จัดการสถานะ</div>
                    <div class="col">

                    </div>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card" style="margin-top: 10px">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
{{--                            <th scope="col">ที่อยู่</th>--}}
{{--                            <th scope="col">เบอร์โทรศัพท์</th>--}}
                            <th scope="col">สถานะ</th>
                            <th scope="col">สถานะชำระเงิน</th>
{{--                            <th scope="col">วิธีการชำระเงิน</th>--}}
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $order->users->first_name." ".$order->users->last_name }}</td>
{{--                                <td>{{ $order->address }}</td>--}}
{{--                                <td>{{ $order->users->tel }}</td>--}}
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
                                    <td>ชำระปลายทาง</td>
                                @elseif($order->pay_status == 1)
                                    <td>ยังไม่ชำระ</td>
                                @elseif($order->pay_status == 2)
                                    <td>รอการตรวจสอบการชำระเงิน</td>
                                @elseif($order->pay_status == 3)
                                    <td>ชำระแล้ว</td>
                                @endif


                                <td class="row">
                                    @if($order->order_status == 2)
                                        <form method="post" action="{{ route('admin.manage-status.orderStatus', $order->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                                                <i>ซักเสร็จรอการชำระเงิน</i>
                                            </button>
                                        </form>
                                    @elseif($order->order_status == 3 && $order->pay_status == 3)
                                        <form method="post" action="{{ route('admin.manage-status.deliverStatus', $order->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <i>จัดส่งเสื้อผ้า</i>
                                            </button>
                                        </form>
                                    @elseif($order->order_status == 3 && $order->pay_status == 0)
                                        <form method="post" action="{{ route('admin.manage-status.deliverStatus', $order->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <i>จัดส่งเสื้อผ้า</i>
                                            </button>
                                        </form>
                                    @endif

                                    @if($order->pay_status == 2)
                                    <a class="btn btn-primary" href="{{ route('admin.manage-status.pay', $order->id) }}" style="margin-left: 1%; margin-right: 1%">
                                        <i> ดูหลักฐานชำระเงิน</i>
                                    </a>
                                    @endif

                                    <a class="btn btn-outline-info" href="{{ route('admin.manage-status.details', $order->id) }}">
                                        ดูรายละเอียด
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex-center" style="margin-top: 0.3%">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
