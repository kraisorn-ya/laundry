@extends('admin.layouts.main_dashboard')
@section('title', 'รายละเอียดการใช้บริการ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header text-header col-md-5">รายงานทั้งหมด</div>
{{--                <div class="row">--}}

{{--                    <div class="col">--}}

{{--                    </div>--}}
{{--                    <div class="col-md-3" style="padding-right: -20%">--}}
{{--                        <form action="{{ route('admin.order-details.search') }}" method="post" role="search">--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-group" value="{{$search }}">--}}
{{--                                <span class="input-group-prepend">--}}
{{--                                    <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card" style="margin-top: 10px">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">วันที่ใช้บริการ</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $order->users->first_name." ".$order->users->last_name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->users->tel }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td class="row">
                                    <form method="post" action="{{ route('admin.order-details.details', $order->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-info">
                                            <i class="fa fa-book"> ดูรายละเอียด</i>
                                        </button>
                                    </form>
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
