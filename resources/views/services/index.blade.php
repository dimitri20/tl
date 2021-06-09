@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container services_outer_container">
                <div id="services-title-container">
                    <h2 class="title-align-center logo-colored">{{ __('სერვისები') }}</h2>
                </div>
                @for ($i = 0; $i < floor(sizeof($services)/3); $i++)
                <div class="row">
                    @for($j = 0; $j < 3; $j++)
                    <div class="col-lg-4 col-md-12 mb-4 service-container">
                        <img
                            src="{{ asset(substr($services[3*$i+$j]['image_path'],1)) }}"
                            alt="">

                        <a
                            href="/services/{{ $services[3*$i+$j]['id'] }}"
                            class="service-a-tag text-decoration-none text-center">

                            <p class="text-center">{{ $services[3*$i+$j]['title'] }}</p>
                        </a>
                    </div>
                    @endfor
                </div>
                @endfor

                <div class="row">
                    @for($j = 0; $j < sizeof($services)%3; $j++)
                    <div class="col-lg-4 col-md-12 mb-4 service-container">

                        <img src="{{ asset(substr($services[3*(floor(sizeof($services)/3))+$j]['image_path'], 1)) }}" alt="">
                        <a href="{{ route('services.id', ['id'=>$services[3*(floor(sizeof($services)/3))+$j]['id'], 'language' => app()->getLocale()]) }} " class="service-a-tag text-decoration-none text-center"><p class="text-center">{{ $services[3*(floor(sizeof($services)/3))+$j]['title'] }}</p></a>

                    </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>

</header>

@include('layouts.footer')

@endsection
