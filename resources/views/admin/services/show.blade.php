@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Services</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <form method="POST" action="{{ route("admin.services.destroy", $service->id) }}" class="deletePost">
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
                <div class="col ml-3">{{ $service->id }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">title ka</div>
                <div class="col ml-3"><span>{{ $service->title_ka }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">title en</div>
                <div class="col ml-3"><span>{{ $service->title_en }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">title ru</div>
                <div class="col ml-3"><span>{{ $service->title_ru }}</span></div>
            </div>

            <td><img src="{{asset('storage/'.$service->image_path)}}" width=100px alt=""></td>

         </div>

    </div>


@endsection
