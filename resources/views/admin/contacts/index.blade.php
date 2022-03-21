@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Contacts</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("admin.contacts.create")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Contacts</span></a></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>


         <div class="container">
            <table class="table table-striped">
                <thead>
                   <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Value</th>
                      <th scope="col">Actions</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->contact_name }}</th>
                            <td>{{ $contact->contact_info }}</td>
                            <td>
                                <a href="{{route('admin.contacts.show', $contact->id)}}" class="text-decoration-none"><span><i class="fa fa-eye"></i> View</span></a>
                                <form method="POST" action="{{ route("admin.contacts.destroy", $contact->id) }}" class="deletePost">
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
