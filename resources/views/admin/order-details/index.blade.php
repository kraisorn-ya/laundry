@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายละเอียดการใช้บริการ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-header col-md-12">รายละเอียดการใช้บริการทั้งหมด</div>
                <form method="post" action="{{ route('admin.order-details.search') }}" role="search">
                    @csrf
                    <div class="row" style="margin-top: 3%">
                        <label style="margin-left: 1%; margin-right: 1%">เริ่มวันที่</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="dateStart" id="dateStart" value="{{$dateStart}}" />
                        </div>
                        <label style="margin-left: 1%; margin-right: 1%">ถึง</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="dateEnd" id="dateEnd" value="{{$dateEnd}}" />
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit" style="height: 40px; margin-left: 10px">
                            <i class="fas fa-search"> ค้นหา</i>
                        </button>
                    </div>
                </form>
                <div class="card" style="margin-top: 10px">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">วันที่ใช้บริการ</th>
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
                                <td>{{ $order->updated_at }}</td>
                                <td>{{ $order->total_price }}</td>
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
@push('script')
    <script type="text/javascript">

        $(function(){

            var startDateTextBox = $('#dateStart');
            var endDateTextBox = $('#dateEnd');

            startDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (endDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            endDateTextBox.datetimepicker('setDate', testStartDate);
                    }
                    else {
                        endDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
                }
            });
            endDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (startDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            startDateTextBox.datetimepicker('setDate', testEndDate);
                    }
                    else {
                        startDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
                }
            });

        });

    </script>
@endpush