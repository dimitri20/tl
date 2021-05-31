@extends('layouts.index')

@section('content')

<header id="header">
    
    @include('layouts.navigation')

    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container">
                <div class="back"><a href="/blog"><img src="/images/arrow-back.svg" alt="back"></a></div>

                <h2 class="title-align-center">{{ $post['title'] }}</h2>

                <div class="service-image">
                    <img src="/images/service.jpeg" alt="">
                </div>

                <div style="margin-top: 20px;" class="text-main-formatting">
                    {{ $post['description'] }}
                </div>

            </div>
        </div>
    </div>

</header>


@include('layouts.footer')


@endsection