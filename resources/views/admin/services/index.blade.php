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
                        <li class="breadcrumb-item"><a href="{{route("admin.services.create")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></a></li>
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
                      <th scope="col">title_ka</th>
                      <th scope="col">Image</th>
                      <th scope="col">Actions</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($services as $service)
                        <tr>
                            <th scope="row">{{ $service->id }}</th>

                            <td>{{ $service->title_ka }}</td>

                            <td><img src="{{asset('storage/'.$service->image_path)}}" width=100px alt=""></td>

                            <td>
                                <a href="{{route('admin.services.show', $service->id)}}" class="text-decoration-none"><span><i class="fa fa-eye"></i> View</span></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

             </table>
         </div>

    </div>


@endsection
