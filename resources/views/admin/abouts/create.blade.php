@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">


         <div class="container">


            <form method="post" action="{{ route('admin.about.store') }}">
                @csrf

                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row my-4">
                          <div class="col-sm-6">
                             <h1 class="m-0">Abouts</h1>
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
                    <select name="language" class="form-control">
                        <option value="ka">ka</option>
                        <option value="en">en</option>
                        <option value="ru">ru</option>
                    </select>
                </div>

                <div class="form-group">
                   <label for="Content">Content</label>
                   <textarea id="htmeditor" name="content" class="form-control"></textarea>
                </div>

             </form>

         </div>


    </div>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.8/js/froala_editor.pkgd.min.js'></script>

    <script>
        var editor = new FroalaEditor('#htmeditor');
    </script>
@endsection
