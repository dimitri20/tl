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

                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{__(Session::get('success'))}}
                        </div>
                    @endif

                  <form class="row g-3" method="post" action="{{ route('contact.store', ['language' => app()->currentLocale()]) }}">
                      @csrf

                    <div class="col-md-6">

                      <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"  name="name" placeholder="{{ __('სახელი') }}">
                        <!-- Error -->
                        @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>


                    <div class="col-md-6">

                      <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" placeholder="{{ __('იმეილი') }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                    </div>


                    <div class="col-12">

                      <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" id="inputAddress" placeholder="{{ __('სათაური') }}">
                        @if ($errors->has('subject'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('subject') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                      <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" placeholder="{{ __('ტექსტი') }}" style="height:200px"></textarea>
                        @if ($errors->has('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
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
