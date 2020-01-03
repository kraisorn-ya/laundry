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
{{--                        <h5 class="card-title">Special title treatment</h5>--}}
{{--                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    </div>
                </div>
            </div>
            @endforeach
{{--            <div class="col-sm-6">--}}
{{--                <h4 class="text-color-black">{{ array_get($service_type,'1.name') }}</h4>--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">ss</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Special title treatment</h5>--}}
{{--                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <h4 class="text-color-black">ssss</h4>--}}
{{--        <div class="col-sm-12 card" style="margin-top: 1%">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">Special title treatment</h5>--}}
{{--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection

{{--<div class="container" style="margin-top: 5%">--}}
{{--    <div>ใช้บริการ</div>--}}
{{--    <div class="card row">--}}
{{--        <h3 class="col-md-12">ค่าบริการ{{ array_get($service_type,'0.name') }}</h3>--}}
{{--        <div class="card col-md-6">--}}
{{--            @foreach($clothes as $clothe)--}}
{{--                <div class="form-group">--}}
{{--                    <label class="text-center col-md-5">{{ $clothe->name." (".$clothe->service_type->name }})</label>--}}
{{--                    <input class="col-md-2" type="text" >--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <h3 class="col-md-12">ค่าบริการ{{ array_get($service_type,'1.name') }}</h3>--}}
{{--        <div class="card col-md-6">--}}
{{--            sada--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="card col-md-12">--}}
{{--        asd--}}
{{--    </div>--}}

{{--</div>--}}