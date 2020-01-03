@extends('admin.layouts.main_dashboard')
@section('title', 'Create Promotion')
@section('content')
    <div class="container">
        <form action="{{ route('admin.promotion.store') }}" method="post">
            @csrf
{{--            <div class="form-group">--}}
{{--                <label>ประเภทข่าวสาร <span style="color:red">*</span></label>--}}
{{--                <select class="form-control" name="articles_category_id">--}}
{{--                    <option selected disabled>กรุณาเลือกประเภทข่าวสาร</option>--}}
{{--                    @foreach ($article_categories as $article_category)--}}
{{--                        <option--}}
{{--                                {{ (old("articles_category_id") == $article_category->id ? "selected":"") }} value="{{ $article_category->id }}">{{ $article_category->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @if ($errors->has('articles_category_id'))--}}
{{--                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">--}}
{{--                                            <strong>{{ $errors->first('articles_category_id') }}</strong>--}}
{{--                                        </span>--}}
{{--                @endif--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ระยะเวลาโปรโมชั่น <span style="color: red">*</span></label>
                        วันเริ่ม : <input type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                        @if ($errors->has('start_date'))
                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                        @endif
                        วันสิ้นสุด : <input type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                        @if ($errors->has('end_date'))
                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="form-group ">
                <label>ชื่อโปรโมชั่น <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="title"
                       placeholder="ชื่อโปรโมชั่น" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>ส่วนลด % <span style="color:red">*</span></label>
                <input type="text" class="form-control col-md-1" name="discount"
                       placeholder="ส่วนลด" value="{{ old('discount') }}">
                @if ($errors->has('discount'))
                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                        <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>รายละเอียดโปรโมชั่น <span style="color:red">*</span></label>
                <textarea class="form-control ckeditor" id="editor" name="description"
                          placeholder="Description"
                          rows="9"{{ old('description') }}>{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        เพิ่ม
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.promotion.index') }}">ยกเลิก</a>
                </div>
            </div>
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
