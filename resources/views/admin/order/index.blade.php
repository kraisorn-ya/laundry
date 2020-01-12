@extends('admin.layouts.main_dashboard')
@section('title', 'เรียกใช้บริการจากลูกค้า')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
{{--                <div class="row">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <a class="btn btn-outline-primary" href="{{ route('admin.order.create') }}"><i class="fas fa-pencil-alt">  สร้างบัญชีพนักงาน</i></a>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}

{{--                    </div>--}}
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
{{--                </div>--}}

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
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ยืนยันการลบข้อมูล
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">ยืนยัน</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
