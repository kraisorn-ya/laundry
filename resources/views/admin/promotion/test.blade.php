@extends('admin.layouts.main_dashboard')
@section('title', 'Promotion')
@section('content')
    <div class="container">
        <form action="{{ route('admin.promotion.post') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ระยะเวลาโปรโมชั่น <span style="color: red">*</span></label>
                        วันเริ่ม : <input type="text" name="start_date" id="start_date"
                                          value="{{ array_get($about,'0.start_date') }}">
                        วันสิ้นสุด : <input type="text" name="end_date" id="end_date"
                                            value="{{ array_get($about,'0.end_date') }}">
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label>ชื่อโปรโมชั่น <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="title"
                       placeholder="Title" value=" {{ array_get($about,'0.title') }}">
            </div>
            <div class="form-group">
                <label>รายละเอียดโปรโมชั่น <span style="color:red">*</span></label>
                <textarea class="form-control ckeditor" id="editor" name="short_description"
                          placeholder="Short Description"
                          rows="9">{{ array_get($about,'0.short_description') }}</textarea>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.users.index') }}">Back</a>
                </div>
            </div>
            <input type="hidden" value="{{ array_get($about,'0.id') }}" name="id">
        </form>
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

    </script>
@endpush