@extends('admin.layouts.main_dashboard')
@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="card mb-5" style="max-width: 100%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/'.Auth::user()->image) }}" class="card-img"  alt="...">
                        <a class="ิbtn btn-outline-danger " href="{{ route('admin.edit') }}"><i class="fas fa-edit">แก้ไขข้อมูลส่วนตัว</i></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title topic-red">ข้อมูลส่วนตัว</p>
                            <label class="topic-gray" style="margin-right: 1%">ชื่อ:</label> <label class="topic-black"> {{ $data->first_name.'  '.$data->last_name }}</label>
                            <label class="topic-gray" style="margin-right: 1%">ตำแหน่ง:</label> <label class="topic-black"> {{ $data->role->name }}</label>
                            <br>
                            <label class="topic-gray" style="margin-right: 1%">เพศ:</label> <label class="topic-black"> {{ $data->gender }}</label>
                            <label class="topic-gray" style="margin-right: 1%">เลขบัตรประชาชน:</label> <label class="topic-black"> {{ $data->id_card }}</label>
                            <br>
                            <label class="topic-gray" style="margin-right: 1%">ที่อยู่:</label> <label class="topic-black"> {{ $data->address }}</label>
                            <br>
                            <label class="topic-gray" style="margin-right: 1%">อีเมล:</label> <label class="topic-black"> {{ $data->email}}</label>
                            <br>
                            <label class="topic-gray" style="margin-right: 1%">เบอร์โทร:</label> <label class="topic-black"> {{ $data->tel}}</label>
                            <br>
                            <label class="topic-gray" style="margin-right: 1%">ตำแหน่ง:</label> <label class="topic-black"> {{ $data->role->name}}</label>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-success">Footer</div>
            </div>
        </div>
    </div>
@endsection