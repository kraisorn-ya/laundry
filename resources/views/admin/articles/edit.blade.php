@extends('admin.layouts.main_dashboard')
@section('title', 'Edit Articles')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('แก้ไขข่าวสาร') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.articles.update',[array_get($data,'id')]) }}"
                              style="padding: 40px" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>ประเภทข่าวสาร <span style="color:red">*</span></label>
                                <select class="form-control" name="articles_category_id">

                                    @foreach ($article_categories as $article_category)
                                        <option
                                                value="{{ $article_category->id }}" {{ $data->articles_category_id == $article_category->id ? "selected":"" }}>
                                            {{ $article_category->name }}
                                        </option>
                                    @endforeach
                                    @if ($errors->has('articles_category_id'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('articles_category_id') }}</strong>
                                        </span>
                                    @endif
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group ">
                                    <label>ชื่อข่าวสาร <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Title" value="{{ $data->title }}">
                                    @if ($errors->has('title'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียดสั้น <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="editor" name="short_description"
                                           placeholder="Short Description" value="{{ $data->short_description }}">
                                    @if ($errors->has('short_description'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('short_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียด <span style="color:red">*</span></label>
                                    <textarea class="form-control ckeditor" id="editor" name="description"
                                              placeholder="Short Description"
                                              rows="4">{{ $data->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>รูปโปร์ไฟล์</label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <a id="linkProduct"
                                           href="{{ ($data->image == 'NULL') ? '' : asset('storage/'.$data->image) }}"
                                           target="blank">
                                            <img class="rounded-circle" id="previewProduct"
                                                 style="width: 160px;height: 160px"
                                                 src="{{ ($data->image == 'NULL') ? 'https://via.placeholder.com/180x120.png?text=No%20Image'
                                     : asset('storage/'.$data->image) }}">
                                        </a>
                                        <div style="margin-left: 8rem"><input class="btn btn-sm btn-warning "
                                                                              type="button" value="Clear"
                                                                              onclick="clearProduct()"></div>

                                        @if ($errors->has('image'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <input type="file" accept="image/jpeg, image/png" onchange="readProduct(this);"
                                       id="fileProduct"
                                       name="image">
                                <p class="help-block" style="font-size: 14px">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                                    ขนาดไฟล์ไม่เกิน 1 MB <br>
                                </p>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        โพส
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('admin.articles.index') }}">ยกเลิก</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        <script type="text/javascript">

            function readProduct(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#falseinput').attr('src', e.target.result);
                        $('#previewProduct').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                    $('#linkProduct').removeAttr('href');
                }
            }
        function clearProduct() {
            var image = '{{ $data->image }}';
            if (image == 'NULL') {
                $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct').attr('src', "{{ asset('storage/'.$data->image) }}");
                $('#linkProduct').attr('href', "{{ asset('storage/'.$data->image) }}");
            }
            $('#fileProduct').val(null);
        }

    </script>

@endpush
