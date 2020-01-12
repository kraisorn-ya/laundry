@extends('backend-users.layouts.main_dashboard')
@section('title', 'ใบสั่ง')
@section('content')
    <div class="container">
        <div class="row">

            @foreach($service_types as $service_type)
            <div class="col-sm-6">
                <h4 class="text-color-black">{{ $service_type->name }}</h4>
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
                            ->where('service_type_id',$service_type->id)
                            ->get();
                        ?>
                        @foreach($clothes as $clothe)
                        <div class="row">
                            <div class="col-md-3">
                                <p>{{ $clothe->name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $clothe->price }}</p>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
    </div>

@endsection
