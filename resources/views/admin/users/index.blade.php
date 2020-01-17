@extends('admin.layouts-admin.main_dashboard')
@section('title', 'Users')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-outline-primary" href="{{ route('admin.users.create') }}"><i class="fas fa-pencil-alt">  สร้างบัญชีลูกค้า</i></a>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col-md-2" style="padding-right: -20%">
                        <form action="{{ route('admin.users.search') }}" method="post" role="search">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" class="form-group" value="{{$search }}">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search">Search</i>
                                    </button>
                                </span>
                            </div>
                        </form>
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
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
{{--                                <td>{{ $user->first_name." ".$user->last_name }}</td>--}}
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="row">
                                    <a class="btn btn-outline-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        <i class="fas fa-user-edit"> edit</i>
                                    </a>
                                    <form method="post" action="{{ route('admin.users.delete', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return deleletconfig()">
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function deleletconfig(){

            var del=confirm("คุณแน่ใจหรือไม่ ลบบัญชีผู้ใช้นี้");
            if (del==true){
                alert ("ลบเรียบร้อยแล้ว")
            }else{
                alert("ยกเลิกการลบ")
            }
            return del;
        }
    </script>
@endpush