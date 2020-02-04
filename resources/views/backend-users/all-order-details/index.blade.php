@extends('backend-users.layouts.main_dashboard')
@section('title', 'รายเอียดการใช้บริการทั้งหมด')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header text-header col-md-5">รายเอียดการใช้บริการทั้งหมด</div>
                <div class="card" style="margin-top: 10px">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
{{--                            <th scope="col">ชื่อ</th>--}}
{{--                            <th scope="col">ที่อยู่</th>--}}
{{--                            <th scope="col">เบอร์โทรศัพท์</th>--}}
                            <th scope="col">ยอด</th>
                            <th scope="col">วันที่ใช้บริการ</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
{{--                                <td>{{ $order->users->first_name." ".$order->users->last_name }}</td>--}}
{{--                                <td>{{ $order->address }}</td>--}}
{{--                                <td>{{ $order->users->tel }}</td>--}}
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td class="row">
                                    <a class="btn btn-primary"
                                       href="{{ route('users.all-order-details.details', $order->id) }}">
                                        <i class="fa fa-book"> ดูรายละเอียด</i>
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

