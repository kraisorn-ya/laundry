@extends('admin.layouts.main_dashboard')
@section('title', 'รายการเสื้อผ้า')
@section('content')
    <div class="container">
        <div class="row">

            @foreach($serviceTypes as $serviceType)
                <div class="col-sm-6">
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
                                ->where('service_type_id',$serviceType->id)
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
