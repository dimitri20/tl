@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
         <div class="container">


            <form method="post" action="{{ route('admin.servicesContent.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row my-4">
                          <div class="col-sm-6">
                             <h1 class="m-0">Services</h1>
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
                    <label for="">Title (Georgian)</label>
                    <input class="form-control" type="text" name="content_ka" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="">Content (English)</label>
                    <input class="form-control" type="text" name="content_en" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="">Content (Russian)</label>
                    <input class="form-control" type="text" name="content_ru" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="language">Select Service</label>
                    <select name="services_id" class="form-control">
                       @foreach ($services as $s)
                        <option value="{{ $s->id }}">{{ $s->title_ka }}</option>
                       @endforeach
                    </select>
                 </div>
             </form>

         </div>


    </div>
@endsection
