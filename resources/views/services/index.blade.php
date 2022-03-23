@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container">
        <div class="w-75 m-sm-auto">
            <div class="services_outer_container">
                <div id="services-title-container">
                    <h2 class="title-align-center logo-colored">{{ __('სერვისები') }}</h2>
                </div>

                <div class="row justify-content-center">
                    @foreach($services as $service)
                    <div class="col-auto mb-4 mx-2 service-container">
                        <a href="{{ route('services.id', ['id'=>$service['id'], 'language' => app()->getLocale()]) }}">
                            <img
                                src="{{ asset('storage/'.$service['image_path']) }}"
                                alt="">
                        </a>

                        <a
                            href="{{ route('services.id', ['id'=>$service['id'], 'language' => app()->getLocale()]) }}"
                            class="service-a-tag text-decoration-none text-center">

                            <p class="text-center">{{ $service['title'] }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
                {{-- @for ($i = 0; $i < floor(sizeof($services)/3); $i++)
                <div class="row">
                    @for($j = 0; $j < 3; $j++)
                    <div class="col-lg-4 col-md-12 mb-4 service-container">
                        <img
                            src="{{ asset(substr($services[3*$i+$j]['image_path'],1)) }}"
                            alt="">

                        <a
                            href="{{ route('services.id', ['id'=>$services[3*$i+$j]['id'], 'language' => app()->getLocale()]) }}"
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
                </div> --}}
            </div>

        </div>
    </div>

</header>

@include('layouts.footer')

@endsection
