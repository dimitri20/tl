@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
         <div class="container">


            <form method="post" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row my-4">
                          <div class="col-sm-6">
                             <h1 class="m-0">Team</h1>
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
                    <label for="">Name (Georgian)</label>
                    <input class="form-control" type="text" name="name_ka" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="">Position (Georgian)</label>
                    <input class="form-control" type="text" name="position_ka" placeholder="Default input" required>
                 </div>


                 <div class="form-group">
                    <label for="Content">About (Georgian)</label>
                    <textarea id="htmeditor_ka" class="form-control" name="about_ka"></textarea>
                 </div>

                 <div class="border-bottom my-5" style="height: 30px;">
                 </div>


                 <div class="form-group">
                    <label for="">Name (English)</label>
                    <input class="form-control" type="text" name="name_en" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="">Position (English)</label>
                    <input class="form-control" type="text" name="position_en" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="Content">About (English)</label>
                    <textarea id="htmeditor_en" class="form-control" name="about_en"></textarea>
                 </div>

                 <div class="border-bottom my-5" style="height: 30px;">
                 </div>

                 <div class="form-group">
                    <label for="">Name (Russian)</label>
                    <input class="form-control" type="text" name="name_ru" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="">Position (Russian)</label>
                    <input class="form-control" type="text" name="position_ru" placeholder="Default input" required>
                 </div>

                 <div class="form-group">
                    <label for="Content">About (Russian)</label>
                    <textarea id="htmeditor_ru" class="form-control" name="about_ru"></textarea>
                 </div>

                 <div class="border-bottom my-5" style="height: 30px;">
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


    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.8/js/froala_editor.pkgd.min.js'></script>

    <script>
            var editor = new FroalaEditor('#htmeditor_ka');
            var editor1 = new FroalaEditor('#htmeditor_en');
            var editor2 = new FroalaEditor('#htmeditor_ru');
    </script>
@endsection
