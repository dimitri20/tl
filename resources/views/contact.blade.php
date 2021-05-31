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
                      <img src="images/location.png" alt="">
                    </div>
                    
                    <div id="contact-info-left-side">
                      <p><h3>ვან ფოინთი</h3></p>
                      <p><a href="#">HR@ONEPOINT.GE</a></p>
                      <p>მისამართი: თბილისი, ჯონ (მალხაზ) შალიკაშვილის ქ. 8</p>
                      <p>ტელეფონი: <a href="#">+995 577 753 332</a></p>
                     
                      <div class="social">
                        <a href="facebook.com" class="social-icon"><img src="images/facebook.svg" alt=""></a>
                        <a href="facebook.com" class="social-icon"><img src="images/facebook.svg" alt=""></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="services-left-hand-items-container"> 
                  <!-- <div id="map" style="width:100%; height:400px;"></div> -->
                  {{-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDSxB9csGmToyGHlFyupa2m4QCBib6w4Dk&q=Georgia, Tbilisi" height="300" width="100%" frameborder="0"></iframe> --}}
                  <h3 class="send-us-message-headers">SEND US A MESSAGE</h3>
                  <form class="row g-3">
                    <div class="col-md-6">
                      
                      <input type="email" class="form-control" placeholder="სახელი">
                    </div>
                    <div class="col-md-6">
                      
                      <input type="password" class="form-control" placeholder="იმეილი">
                    </div>
                    <div class="col-12">
                      
                      <input type="text" class="form-control" id="inputAddress" placeholder="სათაური">
                    </div>
                    <div class="col-12">
                      <textarea class="form-control" placeholder="ტექსტი" style="height:200px"></textarea>
                      <!-- <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                    </div>
                    
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary section-button">გაგზავნა</button>
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