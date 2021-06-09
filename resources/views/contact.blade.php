@extends('layouts.index')


@section('content')

<header id="header">
    @include('layouts.navigation')

    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container">
                
              <div class="services-flex-container d-flex justify-content-center">

                <div class="section-right-hand-items-outer-container">
                  <div class="d-flex contact-info-left-side-wrapper">
                    <div id="contact-info-right-side-image">
                      <img src="{{ asset('storage/icons/location.png') }}" alt="">
                    </div>
                    
                    <div id="contact-info-left-side">
                      <p><h3>{{ __('თიელი') }}</h3></p>
                      <p><a href="#" class="text-decoration-none contact-a">{{ (!empty($contact_info['mail'])) ? $contact_info['mail'] : '' }}</a></p>
                      <p><a href="#" class="text-decoration-none contact-a">{{ (!empty($contact_info['physical_address'])) ? $contact_info['physical_address'] : '' }}</a></p>
                      <p>{{ __('ტელეფონი') }}: <a href="#" class="text-decoration-none contact-a">{{ (!empty($contact_info['phone'])) ? $contact_info['phone'] : '' }}</a></p>
                     
                      <div class="social">
                        <a href="https://www.facebook.com" class="social-icon" target="_blank"><img src="{{ asset('storage/icons/facebook.svg') }}" alt=""></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="services-left-hand-items-container"> 
                  <h3 class="send-us-message-headers">{{ __('მოგვწერე წერილი') }}</h3>
                  <form class="row g-3">
                    <div class="col-md-6">
                      
                      <input type="email" class="form-control" placeholder="{{ __('სახელი') }}">
                    </div>
                    <div class="col-md-6">
                      
                      <input type="password" class="form-control" placeholder="{{ __('იმეილი') }}">
                    </div>
                    <div class="col-12">
                      
                      <input type="text" class="form-control" id="inputAddress" placeholder="{{ __('სათაური') }}">
                    </div>
                    <div class="col-12">
                      <textarea class="form-control" placeholder="{{ __('ტექსტი') }}" style="height:200px"></textarea>
                      
                    </div>
                    
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary section-button">{{ __('გაგზავნა') }}</button>
                    </div>
                  </form>
                </div>

              </div>

            </div>
            
        </div>
    </div>  


</header>
    
@include('layouts.footer')
@endsection