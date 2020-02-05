@extends('frontend.layouts.main')
@section('title', 'Laundry')

@section('content')
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1 class="text-center" style="color: white"> ข่าวสาร</h1>
                    <div class="card">
                        <div class="card-body ">
                            <h1 class="text-center">{{ $article->title }}</h1>
                            <div class="flex-center">
                                <img  src="{{asset('storage/'.$article->image)}}">
                            </div>
                            <div class="text-center py-5">
                                <p style="font-weight: bold;color: black" >{!! $article->short_description   !!} </p>
                                <p>{!! $article->description   !!} </p>
                            </div>
                        </div>
                        <div class="col-md-5 offset-5">
                            <a class="btn btn-danger" href="{{ route('laundry.articles.index') }}" style="width: 150px; margin-top: -30%">กลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection