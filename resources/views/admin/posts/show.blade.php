@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Post</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <form method="POST" action="{{ route("admin.posts.destroy", $post->id) }}" class="deletePost">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="ml-2">Delete</span>
                                </button>
                            </form>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="text-decoration-none ml-3"><span><i class="fas fa-edit"></i> Edit</span></a>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>



         <div class="container">
            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">Id</div>
                <div class="col ml-3">{{ $post->id }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">title (Georgian)</div>
                <div class="col ml-3"><span>{{ $post->title_ka }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">slug (georgian)</div>
                <div class="col ml-3"><span>{{ $post->slug_ka }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">content (Georgian)</div>
                <div class="col ml-3" style="text-align: justify; overflow-wrap: anywhere;"><span>{!! $post->content_ka !!}</span></div>
            </div>


            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">title (English)</div>
                <div class="col ml-3"><span>{{ $post->title_en }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">slug (English)</div>
                <div class="col ml-3"><span>{{ $post->slug_en }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">content (English)</div>
                <div class="col ml-3" style="text-align: justify; overflow-wrap: anywhere;"><span>{!! $post->content_en !!}</span></div>
            </div>


            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">title (Russian)</div>
                <div class="col ml-3"><span>{{ $post->title_ru }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">slug (Russian)</div>
                <div class="col ml-3"><span>{{ $post->slug_ru }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">content (Russian)</div>
                <div class="col ml-3" style="text-align: justify; overflow-wrap: anywhere;"><span>{!! $post->content_ru !!}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">Image</div>
                <div class="col ml-3"><img src="{{asset('storage/'.$post->image_path)}}" class="w-100" alt=""></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right font-weight-bold">Files</div>
                <div class="col ml-3">
                    <div class="mt-5">
                        @foreach($files as $file)
                            <ul class="list-group">
                                <li class="list-group-item removable-file mt-2 d-flex justify-content-between">
                                    <a href="{{ asset('storage/'.$file['path']) }}" target="_blank">
                                        <i class="fas fa-file"></i>
                                        {{$file['title']}}
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>



         </div>

    </div>


@endsection
