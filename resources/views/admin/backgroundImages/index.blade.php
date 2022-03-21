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
                        <li class="breadcrumb-item"><a href="{{route("admin.backgroundImages.create")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></a></li>
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
                      <th scope="col">Page</th>
                      <th scope="col">Click To View</th>
                      <th scope="col">Actions</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($images as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>


                            <td><img src="{{asset('storage/'.$image->image_path)}}" width=100px alt=""></td>


                            <td>{{ $image->page_url }}</td>

                            <td><a href="{{asset('storage/'.$image->image_path)}}" target=_blank> Open </a></td>

                            <td class="d-flex">
                                <a href="{{route('admin.backgroundImages.show', $image->id)}}" class="text-decoration-none"><span><i class="fa fa-eye"></i> View</span></a>

                                <form method="POST" action="{{ route("admin.backgroundImages.destroy", $image->id) }}" class="deletePost">
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
