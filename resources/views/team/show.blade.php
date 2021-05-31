@extends('layouts.index')

@section('content')

<header id="header">
    @include('layouts.navigation')

    <div class="section-outer-container" id="about">
        <div class="container">
            <div class="section-inner-container">
                <div class="back"><a href="/team"><img src="/images/arrow-back.svg" alt="back"></a></div>
                <div class="row">
                    <div class="col-sm person-container">
                        <img src="/storage/team/{{ $teammate->image_path }}" alt="">
                        <h4 class="text-center fw-bolder">{{ $teammate->name }}</h4>
                        <p class="text-center">{{ $teammate->position }}</p>
                    </div>
    
                    <div class="col-sm">
                        
                        <p class="text-main-formatting">
                            {!! str_replace('<br />', "\r\n", $teammate->about) !!}
                        </p>
    
                    </div>
                </div>
                
        
            </div>
        </div>
    </div>
</header>
    
@endsection