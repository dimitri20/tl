@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
         <div class="container">


            <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row my-4">
                          <div class="col-sm-6">
                             <h1 class="m-0">Background Images</h1>
                          </div>

                          <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></button></li>
                             </ol>
                          </div>
                       </div>
                    </div>
                 </div>



                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Upload image from your computer</label>
                    </div>
                </div>

             </form>

         </div>


    </div>
@endsection
