@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Team</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <form method="POST" action="{{ route("admin.team.destroy", $team->id) }}" class="deletePost">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="ml-2">Delete</span>
                                </button>
                            </form>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.team.edit', $team->id)}}" class="text-decoration-none ml-3"><span><i class="fas fa-edit"></i> Edit</span></a>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>



         <div class="container">
            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">Id</div>
                <div class="col ml-3">{{ $team->id }}</div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">name ka</div>
                <div class="col ml-3"><span>{{ $team->name_ka }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">position ka</div>
                <div class="col ml-3"><span>{{ $team->position_ka }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">about ka</div>
                <div class="col ml-3"><span>{!! $team->about_ka !!}</span></div>
            </div>


            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">name en</div>
                <div class="col ml-3"><span>{{ $team->name_en }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">position en</div>
                <div class="col ml-3"><span>{{ $team->position_en }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">about en</div>
                <div class="col ml-3"><span>{!! $team->about_en !!}</span></div>
            </div>



            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">name ru</div>
                <div class="col ml-3"><span>{{ $team->name_ru }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">position ru</div>
                <div class="col ml-3"><span>{{ $team->position_ru }}</span></div>
            </div>

            <div class="row my-4 p-3 border">
                <div class="col-2 border-right">about ru</div>
                <div class="col ml-3"><span>{!! $team->about_ru !!}</span></div>
            </div>


            <td><img src="{{asset('storage/'.$team->image_path)}}" width=100px alt=""></td>

         </div>

    </div>


@endsection
