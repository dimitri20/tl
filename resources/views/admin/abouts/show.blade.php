@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Abouts</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <form method="POST" action="{{ route("admin.about.destroy", $about->id) }}" class="deletePost">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="ml-2">Delete</span>
                                </button>
                            </form>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admin.about.edit', $about->id)}}" class="text-decoration-none ml-3"><span><i class="fas fa-edit"></i> Edit</span></a></li>
                    </ol>
                  </div>
               </div>
            </div>
         </div>



         <div class="container">
            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Id</div>
                <div class="col ml-3">{{ $about->id }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Language</div>
                <div class="col ml-3">{{ $about->language }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Content</div>
                <div class="col ml-3"><span>{!! $about->content !!}</span></div>
            </div>
         </div>

    </div>


@endsection
