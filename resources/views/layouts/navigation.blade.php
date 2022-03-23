<div class="main-nav-background"></div>

<div class="container main-nav-container">

  <div class="container main-logo-container">
    <a href="{{ asset('/').App::currentLocale() }}" id="logo"><img src="{{ asset('storage/globals/main-logo.png') }}" alt="LOGO"></a>
  </div>

  <button id="main-navbar-toggler" onclick="navbarToggle()">
    <img src="{{ asset('storage/icons/menu-toggler.svg') }}" alt="toggle">
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
              <a class="nav-link {{ (request()->is('/*')) ? 'active' : '' }}" href="{{ route('/', app()->getLocale()) }}">{{ __('მთავარი') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('*about*')) ? 'active' : '' }}" href="{{ route('about', app()->getLocale()) }}">{{ __('ჩვენ შესახებ') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('*team*')) ? 'active' : '' }}" href="{{ route('team', app()->getLocale()) }}">{{ __('ჩვენი გუნდი') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('*services*')) ? 'active' : '' }}" href="{{ route('services', app()->getLocale()) }}">{{ __('სერვისები') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('*blog*')) ? 'active' : '' }}" href="{{ route('blog', app()->getLocale()) }}">{{ __('ბლოგი') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (request()->is('*contact*')) ? 'active' : '' }}" href="{{ route('contact', app()->getLocale()) }}">{{ __('კონტაქტი') }}</a>
            </li>

          </ul>

          <ul class="lang-menu nav">

            <li class="nav-item lang-menu-item">
              <a
                href="
                @php
                  $url = url()->full();
                  $url = explode('/', $url);
                  $url[3] = 'ka';
                  $url = implode('/', $url);
                  echo $url;
                @endphp
                "
                class="lang-menu-link">
                <img src="{{ asset('storage/icons/ge.svg') }}" alt="GE">
                <span class="lang-menu-text">ქარ</span>
              </a>
            </li>

            <li class="nav-item lang-menu-item">
              <a
                href="
                @php
                  $url = url()->full();
                  $url = explode('/', $url);
                  $url[3] = 'en';
                  $url = implode('/', $url);
                  echo $url;
                @endphp
                "
                class="lang-menu-link">
                <img src="{{ asset('storage/icons/en.svg') }}" alt="EN">
                <span class="lang-menu-text">ENG</span>
              </a>
            </li>

            <li class="nav-item lang-menu-item">
              <a
                href="
                @php
                  $url = url()->full();
                  $url = explode('/', $url);
                  $url[3] = 'ru';
                  $url = implode('/', $url);
                  echo $url;
                @endphp
                "
                class="lang-menu-link">
                <img src="{{ asset('storage/icons/ru.svg') }}" alt="">
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

      use App\Models\BackgroundImage;
      $url = !empty(explode('/',Request::path())[1]) ? explode('/',Request::path())[1] : '/';

      $images = BackgroundImage::where('page_url', $url)->get();


      // echo asset('images/1.jpg');

      if($images->count() > 0){

        if(request()->is('services*')){
        echo URL::to('/storage').'/'.BackgroundImage::where('page_url', 'services')->get()[0]['image_path'];
        }
        elseif(request()->is('team*')){
          echo URL::to('/storage').'/'.BackgroundImage::where('page_url', 'team')->get()[0]['image_path'];
        }
        elseif(request()->is('blog*')){
          echo URL::to('/storage').'/'.BackgroundImage::where('page_url', 'blog')->get()[0]['image_path'];
        }
        else {
          echo URL::to('/storage').'/'.$images[0]['image_path'];
        }
      }
      else {
        echo '';
      }



    ?>

    " alt="">


  </div>
</div>
