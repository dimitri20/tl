@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')

    <div class="section-outer-container">
        <div class="container">
            <div class="section-inner-container">
                <div class="back"><a href="{{ route('blog', ['language' => app()->currentLocale()]) }}"><img src="{{ asset('storage/icons/arrow-back.svg') }}" alt="back"></a></div>

                <h2 class="title-align-center">{{ $post['title'] }}</h2>

                <div class="service-image d-flex justify-content-center">
                    <img src="{{ asset(substr($post['image_path'], 1)) }}" alt="" class="post-image ">
                </div>

                <div style="margin-top: 20px;" class="text-main-formatting">
                    {!! $post['content'] !!}
                </div>

                <div style="margin-top: 20px;" class="text-main-formatting">
                    @foreach ($files as $file)
                        <p>
                            <a href="{{ URL::to('/').'/storage/'.$file->path.$file->name.'.'.$file->extension }}" download>{{ $file->original_name }}</a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</header>



@include('layouts/footer')
@endsection
