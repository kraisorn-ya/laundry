@extends('admin.layouts.main_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('รายการเสื้อผ้า') }}</div>

                    <div class="card-body">
                        <form method="POST" action="#" style="padding: 40px">

                            @csrf
                            <div class="form-group">
                                <label for="gender" class="right offset-10"> ประเภทเสื้อผ้า :</label>
                                <select name="gender" class="form-control col-md-2 offset-10">
                                    <option value="0">เสื้อ</option>
                                    <option value="1">กางเกง</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/s1.png') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/s2.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/s3.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/y1.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/y2.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img src="{{ asset('img/y2.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ราคา 3 บาท</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header">{{ __('รายชื่อเสื้อผ้าที่ใช้บริการ') }}</div>

                        <div class="card-body">
                            <form method="POST" action="#" style="padding: 40px">

                                @csrf
                                <div class="row">
                                    <div class="card col-md-3">
                                        <img src="{{ asset('img/s1.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">ราคา 3 บาท</p>
                                        </div>
                                    </div>
                                    <div class="card col-md-3">
                                        <img src="{{ asset('img/s2.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">ราคา 3 บาท</p>
                                        </div>
                                    </div>
                                    <div class="card col-md-3">
                                        <img src="{{ asset('img/y1.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">ราคา 3 บาท</p>
                                        </div>
                                    </div>
                                    <div class="card col-md-3">
                                        <img src="{{ asset('img/y2.jpg') }}" class="card-img-top" alt="..." style="size: 10px">
                                        <div class="card-body">
                                            <p class="card-text">ราคา 3 บาท</p>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div>
                                    <p>ราคารวม : 12 บาท</p>
                                </div>
                                <div class="form-group row mb-0" style="margin-top: 20px">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            บันทึก
                                        </button>
                                        <button type="submit" class="btn btn-danger">
                                            ยกเลิก
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection