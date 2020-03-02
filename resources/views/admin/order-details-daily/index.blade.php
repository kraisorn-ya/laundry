@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายงานต่อวัน')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header text-header col-md-5">รายละเอียดการใช้บริการรายวัน</div>

                <div class="card" style="margin-top: 10px">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">รายได้ทั้งหมด
                                        </div>
                                        <?php $total_all = 0; ?>
                                        @foreach($sumToday as $sum)
                                            <?php $total_all = $total_all+$sum->total_price ?>
                                        @endforeach
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_all }} บาท</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">ยอด</th>
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
                                <td>{{ $order->total_price }}</td>
                                <td class="row">
                                    <a class="btn btn-primary" href="{{ route('admin.order-details-daily.details', $order->id) }}">
                                        <i class="fa fa-book">ดูรายละเอียด</i>
                                    </a>
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
