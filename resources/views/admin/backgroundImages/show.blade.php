@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Background Images</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <form method="POST" action="{{ route("admin.backgroundImages.destroy", $image->id) }}" class="deletePost">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="ml-2">Delete</span>
                                </button>
                            </form>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>



         <div class="container">
            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Id</div>
                <div class="col ml-3">{{ $image->id }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Click To Download -></div>
                <div class="col ml-3"><a href="{{asset($image->image_path)}}"  download>Download</a></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">page</div>
                <div class="col ml-3"><span>{{ $image->page_url }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Image</div>
                <div class="col ml-3"><img src="{{asset($image->image_path)}}" class="w-100" alt=""></div>
            </div>

         </div>

    </div>


@endsection
