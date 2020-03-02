@extends('frontend.layouts.main')
@section('title', 'Laundry')

@section('content')
    <section id="intro">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">

                        <h1 class="text-center text-white-th"> ค่าบริการ</h1>
                        <div class="card">
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-md-10">

                                        <div class=" mb4 float-left" style="margin-top: 30px;">
                                            <h1>ค่าบริการ</h1>
                                        </div>

                                        {{--                                        <div class="category-menu d-flex pull-right" style="margin-top: 47px;">--}}
                                        {{--                                            <div class="category-text">--}}
                                        {{--                                                Category:--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="dropdown">--}}
                                        {{--                                                <button type="button" class="btn btn-category  dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">--}}
                                        {{--                                                    @if(request()->segment(3) != null)--}}
                                        {{--                                                        {{ $service_type->name }}--}}
                                        {{--                                                    @else--}}
                                        {{--                                                        all--}}
                                        {{--                                                    @endif--}}
                                        {{--                                                </button>--}}
                                        {{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">--}}
                                        {{--                                                    <a class="dropdown-item" href="{{ route('laundry.service-charge.index2',['name' => null ]) }}">All</a>--}}
                                        {{--                                                    @foreach($service_types as $service_type)--}}
                                        {{--                                                        <a class="dropdown-item"--}}
                                        {{--                                                           href="{{ route('laundry.service-charge.index2',['name' => $service_type->name]) }}">--}}
                                        {{--                                                            {{ $service_type->name }}--}}
                                        {{--                                                        </a>--}}
                                        {{--                                                    @endforeach--}}
                                        {{--                                                    <a class="dropdown-item" href="#"></a>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <div class="article">
                                            @foreach($service_types as $service_type)
                                                <h5 class="card-title">{{ $service_type->name }}</h5>
                                                <div class="card mb-3" >
                                                    <div class="row no-gutters">
                                                        {{--                                                        <div class="col-md-4">--}}
                                                        {{--                                                            <a href="{{route('laundry.articles.content',[$article->id])}}">--}}
                                                        {{--                                                                <img src="{{ asset('storage/'.$article->image) }}" class="card-img" alt="...">--}}
                                                        {{--                                                            </a>--}}

                                                        {{--                                                        </div>--}}
                                                        <div class="col-md-12">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-md-6 text-color-black">
                                                                        ชื่อเสื้อผ้า
                                                                    </div>
                                                                    <div class="col-md-4 text-color-black">
                                                                        ราคา/ต่อชิ้น(บาท)
                                                                    </div>
                                                                    {{--                                                                    <div class="col-md-3 text-color-black">--}}
                                                                    {{--                                                                        จำนวน--}}
                                                                    {{--                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                {{--                                                                <div class="card-body">--}}
                                                                <?php
                                                                $clothes = \App\Clothes::query()
                                                                    ->where('service_type_id',$service_type->id)
                                                                    ->get();
                                                                ?>
                                                                @foreach($clothes as $clothe)
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p>{{ $clothe->name }}</p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <p>{{ $clothe->price }}</p>
                                                                        </div>
                                                                        {{--                                                                            <div class="col-md-2">--}}
                                                                        {{--                                                                                <input class="form-control" type="number">--}}
                                                                        {{--                                                                            </div>--}}
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                            {{--                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        <!-- Pagination -->
                                            {{--                                            <div class="col-md-12">--}}
                                            {{--                                                <ul class="pagination justify-content-center" href="#">--}}
                                            {{--                                                    {{ $articles->links() }}--}}
                                            {{--                                                </ul>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection