@extends('admin.layouts.main_dashboard')
@section('title', 'รายการเสื้อผ้า')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.order.confirm') }}">
            @csrf
        <div class="row" style="margin-left: 5%">
            @foreach($serviceTypes as $serviceType)
                <div class="col-sm-10">
                    <h4 class="text-color-black">{{ $serviceType->name }}</h4>
                    <div class="card" style="margin-top: 2%">
                        <div class="card-header">
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
                                        <p>{{ $clothe->name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $clothe->price }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" name="clothe_qty_{{$clothe->id}}">
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
                    <a class="btn btn-danger" href="{{ route('admin.order.index') }}">กลับ</a>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection