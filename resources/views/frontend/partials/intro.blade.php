<section id="intro" class="clearfix">
    <div class="container">
        <div class="intro-img">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @else
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row offset-md-1">
                                <div class="col">

                                </div>
                                <label for="username" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('ชื่อผู้ใช้ :') }}</label>
                                <div class="col-md-4">
                                    <input id="username" type="text" autocomplete="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"  autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row offset-md-1">
                                <div class="col">

                                </div>
                                <label for="password" class="col-md-4 col-form-label text-md-right letter-white offset-md-3">{{ __('รหัสผ่าน :') }}</label>

                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0 offset-md-8" style="padding-left: 4%">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endauth
                </div>
            @endif
            <img src="{{ asset('newbiz/img/laundry1.png') }}" alt="" class="img-fluid">
        </div>
        <div class="card mb-5" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
{{--                            @foreach($articles as $article)--}}
{{--                            <div class="carousel-item active"  data-interval="10000">--}}
{{--                                <img src="{{ asset('storage/'.$article->image) }}" class="d-block w-100" alt="..." height="250px">--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
                            <div class="carousel-item active" data-interval="10000">
                                <a href="{{route('laundry.articles.content',[array_get($articles,'0.id')])}}">
                                <img src="{{ asset('storage/'.array_get($articles,'0.image')) }}" class="d-block w-100" alt="..." height="250px">
                                </a>
                            </div>
                            <div class="carousel-item" data-interval="2000">
                                <a href="{{route('laundry.articles.content',[array_get($articles,'1.id')])}}">
                                <img src="{{ asset('storage/'.array_get($articles,'1.image')) }}" class="d-block w-100" alt="..." height="250px">
                                </a>
                            </div>
                            <div class="carousel-item" data-interval="2000">
                                <a href="{{route('laundry.articles.content',[array_get($articles,'2.id')])}}">
                                <img src="{{ asset('storage/'.array_get($articles,'2.image')) }}" class="d-block w-100" alt="..." height="250px">
                                </a>
                            </div>
                            <div class="carousel-item" data-interval="2000">
                                <a href="{{route('laundry.articles.content',[array_get($articles,'3.id')])}}">
                                <img src="{{ asset('storage/'.array_get($articles,'3.image')) }}" class="d-block w-100" alt="..." height="250px">
                                </a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        @foreach($articles as $article)
                            <a href="{{route('laundry.articles.content',[$article->id])}}" class="topic-black-20">[{{ $article->articles_category->name."] ".$article->short_description}}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #intro -->