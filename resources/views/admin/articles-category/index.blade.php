@extends('admin.layouts-admin.main_dashboard')
@section('title', 'ArticleCategory')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-outline-primary" href="{{ route('admin.article-category.create') }}"><i class="fas fa-pencil-alt">  เพิ่มประเภทข่าวสาร</i></a>
                    </div>
                    <div class="col">

                    </div>
{{--                    <div class="col-md-3" style="padding-right: -20%">--}}
{{--                        <form action="{{ route('admin.employee.search') }}" method="post" role="search">--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-group" value="{{$search }}">--}}
{{--                                <span class="input-group-prepend">--}}
{{--                                    <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
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
                            <th scope="col">ชื่อประเภทข่าวสาร</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($article_categories as $article_category)
                            <tr>
                                <td scope="row">{{  $article_category->id }}</td>
                                <td>{{  $article_category->name }}</td>
                                <td class="row">
                                    <form method="post" action="{{ route('admin.article-category.delete',  $article_category->id) }}">
                                        @csrf
                                        <a class="btn btn-outline-info" href="{{ route('admin.article-category.edit',  $article_category->id) }}">
                                            <i class="fas fa-user-edit">edit</i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return deleletconfig()" {{count($article_category->articles) == 0?'':'disabled'}}>
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
                {{ $article_categories->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function deleletconfig(){

            var del=confirm("คุณแน่ใจหรือไม่ จะลบประเภทข่าวสารนี้");
            if (del==true){
                alert ("ลบเรียบร้อยแล้ว")
            }else{
                alert("ยกเลิกการลบ")
            }
            return del;
        }
    </script>
@endpush

