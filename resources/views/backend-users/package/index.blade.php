@extends('backend-users.layouts.main_dashboard')
@section('title', 'ใบสั่ง')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-color-black">แพ็คเกจ</h4>
                    <div class="card" style="margin-top: 2%">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3 text-color-black">
                                    ชื่อแพ็คเกจ
                                </div>
                                <div class="col-md-4 text-color-black">
                                    จำนวนเสื้อผ้า(ชิ้น)
                                </div>
                                <div class="col-md-3 text-color-black">
                                    ราคา
                                </div>
                                <div class="col-md-3 text-color-black">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($packages as $package)
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>{{ $package->name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $package->price }}</p>
                                    </div>
                                    <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                       <i class="fas fa-shopping-cart">ซื้อแพ็คเกจ</i>
                                    </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ชื่อแพ็คเกจ : {{ $package->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณซื้อแพ็คเกจนี้หรือไม่
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">ยืนยัน</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>

@endsection
