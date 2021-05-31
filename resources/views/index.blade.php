@extends('layouts.index')

@section('content')
<header id="header">

    @include('layouts.navigation')

    <div class="container">
      <div class="section-inner-container">
        <div class="header-text-container">
          <h1 class="header-top-text text-center">
            თიელი  
            
          </h1>
          <h3 class="text-center">იურიდიული ოფისი</h3>

          <div class="d-flex align-items-center">
            <div class="appearing-text-container">
              <p id="appearing-text-1"><span class="hyphen"><img src="images/hyphen.svg" alt=""></span>ჩვენ ამოვხსნით თქვენს იურიდიულ თავსატეხებს</p> 
              <p id="appearing-text-2"><span class="hyphen"><img src="images/hyphen.svg" alt=""></span>ჩვენ გაპოვნინებთ გამოსავალს გამოუვალ სიტუაციაში</p>             
            </div>
          </div>

        </div>
      </div>
      
    </div>
    

    
  </header>

  @include('layouts.footer')
@endsection()