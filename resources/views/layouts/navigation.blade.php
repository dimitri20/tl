<div class="main-nav-background"></div>
    
<div class="container main-nav-container">

  <div class="container main-logo-container">
    <a href="{{ asset('/') }}" id="logo"><img src="/images/logoWithWhiteContour.png" alt="LOGO"></a>
  </div>

  <button id="main-navbar-toggler" onclick="navbarToggle()">
    <img src="images/menu-toggler.svg" alt="toggle">
  </button>

  <div class="container">
    <nav class="navbar navbar-expand-lg bg-transparent">
      <div class="container-fluid">

        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/*')) ? 'active' : '' }}" href="{{ asset('/') }}">მთავარი</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('about*')) ? 'active' : '' }}" href="{{ asset('about') }}">ჩვენ შესახებ</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('team*')) ? 'active' : '' }}" href="{{ asset('team') }}">ჩვენი გუნდი</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('services*')) ? 'active' : '' }}" href="{{ asset('services') }}">სერვისები</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('blog*')) ? 'active' : '' }}" href="{{ asset('blog') }}">ბლოგი</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('contact*')) ? 'active' : '' }}" href="{{ asset('contact') }}">კონტაქტი</a>
            </li>

          </ul>

          <ul class="lang-menu nav">

            <li class="nav-item lang-menu-item">
              <a href="#" class="lang-menu-link">
                <img src="/images/ge.svg" alt="GE">
                <span class="lang-menu-text">ქარ</span>
              </a>
            </li>

            <li class="nav-item lang-menu-item">
              <a href="#" class="lang-menu-link">
                <img src="/images/en.svg" alt="EN">
                <span class="lang-menu-text">ENG</span>
              </a>
            </li>

            <li class="nav-item lang-menu-item">
              <a href="#" class="lang-menu-link">
                <img src="/images/ru.svg" alt="">
                <span class="lang-menu-text">РУС</span>
              </a>
            </li>

          </ul>
        </div>
      </div>

    </nav>


  </div>

</div>

<div id="header-main-carousel">
  
  <div class="carousel-linear-gradient"></div>
  <div class="carousel-inner">
      
  
    

    <img src="

    <?php 

      $url = Request::path();
      use App\Models\BackgroundImage;
      $images = BackgroundImage::where('page_url', $url)->get();

      
      if($images->count() > 0){
        

        if(request()->is('services*')){
        echo substr(BackgroundImage::where('page_url', 'services')->get()[0]['image_path'], 1);
        }
        elseif(request()->is('team*')){
          echo substr(BackgroundImage::where('page_url', 'team')->get()[0]['image_path'], 1);
        }
        elseif(request()->is('blog*')){
          echo substr(BackgroundImage::where('page_url', 'blog')->get()[0]['image_path'], 1);
        }
        else {
          echo substr($images[0]['image_path'], 1);
        }
      } 
      else {
        echo '';
      }

      

    ?>
    
    " alt="">

    
  </div>
</div>