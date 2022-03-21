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
                        <li class="breadcrumb-item"><a href="{{route("admin.team.create")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></a></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>


         <div class="container">
            <table class="table table-striped">
                <thead>
                   <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name (Georgian</th>
                      <th scope="col">Position (georgian)</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($teams as $team)
                        <tr>
                            <th scope="row">{{ $team->id }}</th>

                            <td><img src="{{asset('storage/'.$team->image_path)}}" width=100px alt=""></td>

                            <th scope="row">{{ $team->name_ka }}</th>
                            <th scope="row">{{ $team->position_ka }}</th>


                            <td class="d-flex">
                                <a href="{{route('admin.team.show', $team->id)}}" class="text-decoration-none"><span><i class="fa fa-eye"></i> View</span></a>
                                <a href="{{route('admin.team.edit', $team->id)}}" class="text-decoration-none ml-3"><span><i class="fas fa-edit"></i> Edit</span></a>
                                <form method="POST" action="{{ route("admin.team.destroy", $team->id) }}" class="deletePost">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <span class="ml-2">Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

             </table>
         </div>

    </div>


@endsection
