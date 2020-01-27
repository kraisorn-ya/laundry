@extends('admin.layouts-admin.main_dashboard')
@section('title', 'Promotion')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-outline-primary" href="{{ route('admin.promotion.create') }}"><i class="fas fa-pencil-alt">  เพิ่มโปรโมชั่น</i></a>
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
                @if(session()->has('deleted'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px">
                        {{ session()->get('deleted') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session()->has('edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                        {{ session()->get('edit') }}
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
                            <th scope="col">ชื่อเรื่อง</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">วันเริ่ม</th>
                            <th scope="col">วันสิ้นสุด</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promotions  as $promotion)
                            <tr>
                                <td scope="row">{{ $promotion->id }}</td>
                                <td>{{ $promotion->title }}</td>
                                <td>{!! $promotion->description !!}</td>
                                <td>{{ $promotion->start_date }}</td>
                                <td>{{ $promotion->end_date }}</td>
                                <td class="row">
                                    <form method="post" action="{{ route('admin.promotion.delete', $promotion->id) }}">
                                        @csrf
                                        <a class="btn btn-outline-info" href="{{ route('admin.promotion.edit', $promotion->id) }}">
                                            <i class="fas fa-user-edit">edit</i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger"  onclick="return deleletconfig();">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex-center" style="margin-top: 0.3%">
                {{ $promotions->links() }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">

        $(function () {

            var startDateTextBox = $('#start_date');
            var endDateTextBox = $('#end_date');

            startDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function (dateText, inst) {
                    if (endDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            endDateTextBox.datetimepicker('setDate', testStartDate);
                    } else {
                        endDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime) {
                    endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate'));
                }
            });
            endDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function (dateText, inst) {
                    if (startDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            startDateTextBox.datetimepicker('setDate', testEndDate);
                    } else {
                        startDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime) {
                    startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate'));
                }
            });

        });

        function deleletconfig(){

            var del=confirm("คุณแน่ใจหรือไม่ จะลบโปรโมชั่นนี้");
            if (del==true){
                alert ("ลบเรียบร้อยแล้ว")
            }else{
                alert("ยกเลิกการลบ")
            }
            return del;
        }

    </script>
@endpush
