@extends('frontend.layouts.main')
@section('title', 'Laundry')

@section('content')
    <section id="intro">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">

                        <h1 class="text-center text-white-th"> ข่าวสาร</h1>
                        <div class="card">
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-md-10">

                                        <div class=" mb4 float-left" style="margin-top: 30px;">
                                            <h1>News</h1>
                                        </div>

                                        <div class="category-menu d-flex pull-right" style="margin-top: 47px;">
                                            <div class="category-text">
                                                Category:
                                            </div>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-category  dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                                    @if(request()->segment(3) != null)
                                                        {{ $category->name }}
                                                    @else
                                                        all
                                                    @endif
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                                    <a class="dropdown-item" href="{{ route('laundry.articles.index',['name' => null ]) }}">All</a>
                                                    @foreach($categories as $category)
                                                        <a class="dropdown-item"
                                                           href="{{ route('laundry.articles.index',['name' => $category->name]) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    @endforeach
                                                    <a class="dropdown-item" href="#"></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="article">
                                            @foreach($articles as $article)
                                                <div class="card mb-3" >
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <a href="{{route('laundry.articles.content',[$article->id])}}">
                                                                <img src="{{ asset('storage/'.$article->image) }}" class="card-img" alt="...">
                                                            </a>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $article->title }}</h5>
                                                                <p class="card-text">{!! $article->description !!}</p>
                                                                <a href="{{route('laundry.articles.content',[$article->id])}}" class="btn-sm btn btn-readmore">Read More</a>
                                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                        <!-- Pagination -->
                                            <div class="col-md-12">
                                                <ul class="pagination justify-content-center" href="#">
                                                    {{ $articles->links() }}
                                                </ul>
                                            </div>
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