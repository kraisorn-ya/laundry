@extends('admin.layouts-admin.main_dashboard')
@section('title', 'รายการเสื้อผ้า')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.deliver.confirm', [$order->user_id]) }}">
            @csrf
            <div class="card-header row">
                <div class="col-md-3" style="margin-left: 5%">
                    <p style="font-size: 20px">คุณ: {{$order->users->first_name." ".$order->users->last_name }}</p>
                </div>
                <div class="form-row col-md-3" style="margin-left: 5%">
                    <label>วันที่จะเสร็จ</label>
                    <input type="date" name="date_completed" class="form-control" value="{{ $order->date_completed }}">

                    @if ($errors->has('date_completed'))
                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                           <strong>{{ $errors->first('date_completed') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row" style="margin-left: 5%">
                @foreach($serviceTypes as $serviceType)
                    <div class="col-sm-10">
                        <h4 class="font-order">{{ $serviceType->name }}</h4>
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
                                            <input type="number" class="form-control text-color-black" name="clothe_qty_{{$clothe->id}}">
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
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="form-group row mb-0 col-md-12">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            ยืนยัน
                        </button>
                        <a class="btn btn-danger" href="{{ route('admin.deliver.index') }}">กลับ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection