@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')

    <div class="section-outer-container">


        <div class="container">


            <div class="section-inner-container">
                <div id="services-title-container">
                    <h2 class="title-align-center logo-colored">{{ __('ჩვენი გუნდი') }}</h2>
                </div>

                @for ($i = 0; $i < floor(sizeof($team)/3); $i++)
                <div class="row">

                    @for($j = 0; $j < 3; $j++)
                    <div class="col-sm person-container">
                        <img
                            src="{{ asset('storage/'.substr($team[3*$i+$j]['image_path'], 1)) }}"
                            alt="">

                        <a
                            href="{{ route('team.id', ['id' => $team[3*$i+$j]['id'], 'language' => app()->getLocale() ]) }}"
                            class="text-decoration-none">

                            <h4 class="text-center fw-bolder">
                                {{ $team[3*$i+$j]['name'] }}
                            </h4>
                        </a>

                        <p class="text-center">{{ $team[3*$i+$j]['position'] }}</p>
                    </div>
                    @endfor

                </div>
                @endfor

                <div class="row">
                    @for($j = 0; $j < sizeof($team)%3; $j++)

                    <div class="col-sm person-container">
                        <img
                            src="{{ asset('storage/'.substr($team[3*(floor(sizeof($team)/3))+$j]['image_path'], 1)) }}"
                            alt="">

                        <a
                            href=" {{ route('teammate', ['id' => $team[3*(floor(sizeof($team)/3))+$j]['id'], 'language' => app()->getLocale() ]) }}"
                            class="text-decoration-none">

                            <h4
                                class="text-center fw-bolder">
                                {{ $team[3*(floor(sizeof($team)/3))+$j]['name'] }}
                            </h4>
                        </a>


                        <p class="text-center">
                            {{ $team[3*(floor(sizeof($team)/3))+$j]['position'] }}
                        </p>
                    </div>

                    @endfor
                </div>

            </div>

        </div>
    </div>
</header>

@include('layouts/footer')
@endsection
