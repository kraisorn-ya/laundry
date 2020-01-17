@extends('admin.layouts-admin.main_dashboard')
@section('title', 'เรียกใช้บริการจากลูกค้า')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 ">ลูกค้าเรียกใช้บริการ</div>
                    <div class="col">

                    </div>
                    <div class="col-md-2" style="padding-right: -20%">
                        <form action="{{ route('admin.order.search') }}" method="post" role="search">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" class="form-group" value="{{$search }}">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"> Search</i>
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
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
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
                                <td class="row">
                                    <form method="post" action="{{ route('admin.order.create', $order->id) }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$order->user_id}}">
                                        <button type="submit" class="btn btn-outline-info">
                                            <i class="fa fa-shopping-cart">ยืนยันการใช้บริการ</i>
                                        </button>

                                    </form>
                                    <form method="post" action="{{ route('admin.order.delete', $order->id) }}">
                                        @csrf
{{--                                        <a class="btn btn-outline-info" href="{{ route('admin.order.create', $order->user_id) }}">--}}
{{--                                            <i class="fas fa-user-edit">ยืนยันการใช้บริการ</i>--}}
{{--                                        </a>--}}
                                        <button type="submit" class="btn btn-outline-danger" onclick="return deleletconfig()">
                                            <i class="fas fa-trash-alt"></i>ลบใบสั่ง
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
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function deleletconfig(){

            var del=confirm("คุณแน่ใจหรือไม่ จะลบใบสั่งนี้");
            if (del==true){
                alert ("ลบเรียบร้อยแล้ว")
            }else{
                alert("ยกเลิกการลบ")
            }
            return del;
        }
    </script>
@endpush
