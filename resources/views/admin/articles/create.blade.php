@extends('admin.layouts.main_dashboard')
@section('title', 'Create Articles')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('เพิ่มข่าวสาร') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.articles.store') }}" style="padding: 40px" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>ประเภทข่าวสาร <span style="color:red">*</span></label>
                                    <select class="form-control" name="articles_category_id">
                                        <option selected disabled>กรุณาเลือกประเภทข่าวสาร</option>
                                        @foreach ($article_categories as $article_category)
                                            <option
                                                    {{ (old("articles_category_id") == $article_category->id ? "selected":"") }} value="{{ $article_category->id }}">{{ $article_category->name }}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('articles_category_id'))
                                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('articles_category_id') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="box-body">
                                <div class="form-group ">
                                    <label>ชื่อข่าวสาร <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Title" value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียดสั้น <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="editor" name="short_description"
                                              placeholder="Short Description" value="{{ old('short_description') }}">
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
                                              rows="4">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label >รูปโปรไฟล์</label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <img class="rounded-circle" id="previewProduct" style="width: 160px; height: 160px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                    </div>

                                    @if ($errors->has('image'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <input type="file" accept="image/jpeg, image/png"  onchange="readProduct(this);" id="fileProduct"
                                       name="image">
                                <p class="help-block">
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

        function readProduct(input) {
            if (input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endpush