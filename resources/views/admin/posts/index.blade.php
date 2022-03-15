@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Posts</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("admin.posts.create")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></a></li>
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
                      <th scope="col">Title</th>
                      <th scope="col">Slug</th>
                      <th scope="col-3">Actions</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <th><img src="{{asset('storage/'.$post->image_path)}}" width=100px alt=""></th>
                            <td>{{ $post->title_ka }}</td>
                            <td>{{ $post->slug_ka }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="text-decoration-none"><span><i class="fa fa-eye"></i> View</span></a>
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="text-decoration-none ml-3"><span><i class="fas fa-edit"></i> Edit</span></a>
                                    <form method="POST" action="{{ route("admin.posts.destroy", $post->id) }}" class="deletePost">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <span class="ml-2">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

             </table>
         </div>

    </div>


@endsection
