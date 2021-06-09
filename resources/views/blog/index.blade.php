@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')

    <div class="section-outer-container">
        <div class="container">
            <div  class="text-center">



                <h2 class="title-align-center">{{ __('ბლოგი') }}</h2>

                <main class="my-5">
                    <div class="container">
                        <div class="text-center">
                            @if (sizeof($posts) > 0)
                                <h4 class="mb-5"><strong>{{ __('უახლესი პოსტები') }}</strong></h4>

                                @for ($i = 0; $i < floor(sizeof($posts)/3); $i++)

                                    <div class="row">
                                        @for($j = 0; $j < 3; $j++)

                                        <div class="col-lg-4 col-md-12 mb-4">
                                            <div class="card">
                                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                                <img src="{{ asset(substr($posts[3*$i+$j]['image_path'], 1)) }}" class="post-image" />
                                                <a href="#">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $posts[3*$i+$j]['title'] }}</h5>
                                                <p class="card-text">
                                                {{ $posts[3*$i+$j]['slug'] }}
                                                </p>

                                                <a href="{{ route('blog.id', [ 'id' => $posts[3*$i+$j]['id'], 'language' => app()->getLocale() ]) }}" class="btn btn-primary">Read</a>
                                            </div>
                                            </div>
                                        </div>

                                        @endfor
                                    </div>
                                @endfor


                                <div class="row">
                                    @for($j = 0; $j < sizeof($posts)%3; $j++)

                                    <div class="col-lg-4 col-md-12 mb-4">
                                        <div class="card">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="{{ asset(substr($posts[3*(floor(sizeof($posts)/3))+$j]['image_path'], 1)) }}" class="post-image" />
                                            <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $posts[3*(floor(sizeof($posts)/3))+$j]['title'] }}</h5>
                                            <p class="card-text">
                                            {{ $posts[3*(floor(sizeof($posts)/3))+$j]['slug'] }}
                                            </p>

                                            <a href="{{ route('blog.id', ['id' => $posts[3*(floor(sizeof($posts)/3))+$j]['id'], 'language' => app()->getLocale()]) }}" class="btn btn-primary">Read</a>
                                        </div>
                                        </div>
                                    </div>

                                    @endfor
                                </div>

                            @else

                            <h4 class="mb-5"><strong>{{ __('პოსტები ჯერ არ არის') }}</strong></h4>

                            @endif

                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</header>

@include('layouts/footer')


@endsection
