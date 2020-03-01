@extends('backend-users.layouts.main_dashboard')
@section('title', 'รายการเสื้อผ้า')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('users.order.confirm') }}">
            @csrf
            <div class="row" style="margin-left: 5%; margin-top: 2%">
                <div class="row col-md-12">
                    <p>คุณ: {{ Auth::user()->first_name." ".Auth::user()->last_name }}</p>
                    <div class="col-md-4">
                        <label>ที่อยู่ <span style="color:red">*</span></label>
                        <textarea class="form-control"  name="address"
                                  placeholder="กรอกที่อยู่"
                                  rows="4" style="width: 300px; margin-left: -50%">{{ Auth::user()->address }}</textarea>
                        @if ($errors->has('address'))
                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="box-body col">
                        <p style="font-size: 25px">วิธีชำระเงิน:</p>
                        <input type="radio" name="payment" value="0">  ชำระปลายทาง<br>
                        <input type="radio" name="payment" value="1">  ชำระโดยการส่งหลักฐานการโอนเงิน<br>
                        @if ($errors->has('payment'))
                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                           <strong>{{ $errors->first('payment') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @foreach($serviceTypes as $serviceType)
                    <div class="col-sm-10">
                        <h5 class="font-order">ประเภทบริการ: {{ $serviceType->name }}</h5>
                        <div class="card" style="margin-top: 2%">
                            <div class="card-header bg-info">
                                <div class="row">
                                    <div class="col-md-3 text-color-black">
                                        ชื่อเสื้อผ้า
                                    </div>
                                    <div class="col-md-4 text-color-black">
                                        ราคา/ต่อชิ้น(บาท)
                                    </div>
                                    <div class="col-md-3 text-color-black">
                                        จำนวน
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $clothes = \App\Clothes::query()
                                    ->where('service_type_id', $serviceType->id)
                                    ->get();
                                ?>
                                @foreach($clothes as $clothe)
                                    <div class="row">
                                        <input type="hidden" name="clothe_id_{{$clothe->id}}" value="{{$clothe->id}}">
                                        <div class="col-md-3">
                                            <p class="text-color-black">{{ $clothe->name }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-color-black">{{ $clothe->price }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" min="1" class="form-control text-color-black" name="clothe_qty_{{$clothe->id}}">
                                        </div>
                                    </div>
                                    <input type="hidden" name="clothe_name_{{$clothe->id}}" value="{{$clothe->name}}">
                                    <input type="hidden" name="clothe_price_{{$clothe->id}}" value="{{$clothe->price}}">
                                    <input type="hidden" name="service_type_{{$clothe->id}}" value="{{$clothe->service_type_id}}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="form-group row mb-0 col-md-12">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            ยืนยัน
                        </button>
                        <a class="btn btn-danger" href="{{ route('home') }}">กลับ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
