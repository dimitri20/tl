@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container" id="about">
        <div class="container">
            <div class="section-inner-container">
    
              <div id="services-title-container">
                <h2 class="title-align-center logo-colored">{{ __('ჩვენ შესახებ') }}</h2>
              </div>
    
              <div class="text-main-formatting">

                
                  {!! $about !!}
                

              </div>
        
            </div>
        </div>
    </div>
    
    
</header>


@include('layouts.footer')
    
@endsection