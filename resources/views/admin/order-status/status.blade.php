@extends('admin.layouts-admin.main_dashboard')
@section('title', 'สถานะการใช้บริการ')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.order-status.update', $orders->id) }}">
            @csrf
            <label>สถานะการใช้บริการ</label>
            <select class="form-control {{ $errors->has('order_status') ? ' is-invalid' : '' }} col-md-3" name="order_status">
                @if($orders->order_status == 0)
                    <option selected disabled>ลูกค้าเรียกใช้บริการ</option>
                @elseif($orders->order_status == 1)
                    <option selected disabled>กำลังดำเนินการ</option>
                @elseif($orders->order_status == 2)
                    <option selected disabled>เสร็จแล้วกำลังจัดส่ง</option>
                @elseif($orders->order_status == 3)
                    <option selected disabled>รอการชำระเงิน</option>
                @elseif($orders->order_status == 4)
                    <option selected disabled>เสร็จสิ้น</option>
                    {{--            @elseif($orders->order_status == 5)--}}
                    {{--            <option selected disabled>เสร็จ</option>--}}
                @endif
                {{--            <option value="1">กำลังดำเนินการ</option>--}}
                <option value="2">เสร็จแล้วกำลังจัดส่ง</option>
                <option value="3">รอการชำระเงิน</option>
                <option value="4">เสร็จสิ้น</option>
                {{--            <option value="5">เสร็จสิ้น</option>--}}
            </select>
            <div class="row" style="margin-top: 2%">
                <button class="btn btn-primary" type="submit" style="margin-left: 1%">
                    ยืนยัน
                </button>
                <a class="btn btn-danger" href="{{ route('admin.order-status.index') }}">
                    กลับ
                </a>
            </div>
        </form>
    </div>
@endsection
