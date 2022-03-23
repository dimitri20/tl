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
                    <img src="{{ asset('storage/'.$post['image_path']) }}" alt="" class="post-image ">
                </div>

                <div style="margin-top: 20px;" class="text-main-formatting">
                    {!! $post['content'] !!}
                </div>

                <div style="margin-top: 50px;" class="text-main-formatting">

                    @if ($files)
                        <h2 class="text-center">მიმაგრებული ფაილები</h2>
                    @endif

                    @foreach ($files as $file)
                        <p class="p-4">
                            <a href="{{ URL::to('/').'/storage/'.$file->path.$file->name.'.'.$file->extension }}" download>

                                <img src="{{ asset('images/document.png') }}" style="width: 30px;" alt="file">
                                {{ $file->name }}

                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</header>



@include('layouts/footer')
@endsection
