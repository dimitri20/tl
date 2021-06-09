
@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container">
                <div class="back"><a href="{{ route('services', ['language' => app()->currentLocale()]) }}"><img src="{{ asset('storage/icons/arrow-back.svg') }}" alt="back"></a></div>

                <h2 class="title-align-center">{{ $service_title }}</h2>

                <div class="service-image d-flex justify-content-center">
                    <img src="{{ asset($service_image) }}" alt="" class="post-image ">
                </div>


                <ul class="service-items">
                    @foreach ($service_contents as $service)
                        <li>{{ $service["content"] }}</li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>
</header>

@include('layouts.footer')

@endsection
