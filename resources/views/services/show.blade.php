
@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container">
                <div class="back"><a href="/services"><img src="/images/arrow-back.svg" alt="back"></a></div>

                <h2 class="title-align-center">{{ $service_title }}</h2>

                <div class="service-image">
                    <img src="/images/service.jpeg" alt="">
                </div>

              
                <ul class="service-items">
                    @foreach ($services as $service)
                        <li>{{ $service['content'] }}</li>
                    @endforeach
                </ul>
              

            </div>
        </div>
    </div>
</header>

@include('layouts.footer')

@endsection