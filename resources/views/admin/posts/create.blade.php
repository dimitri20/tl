@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">


         <div class="container">


            <form method="POST" name="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row my-4">
                          <div class="col-sm-6">
                             <h1 class="m-0">Posts</h1>
                          </div>

                          <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></button></li>
                            </ol>
                          </div>
                       </div>
                    </div>
                 </div>


                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            Enter Post Details
                        </h5>
                      </div>

                      <div class="card-body">
                        <div>
                            {{-- georgian --}}
                            <div class="form-group">
                               <label for="">Title (Georgian)</label>
                               <input class="form-control" type="text" name="title_ka" placeholder="Default input" required>
                            </div>
                            <div class="form-group">
                               <label for="">Slug (Georgian)</label>
                               <textarea class="form-control" type="text" name="slug_ka" placeholder="Post description for preview" style="resize:none;" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="Content">Content (Georgian)</label>
                               <textarea id="htmeditor_ka" class="form-control" name="content_ka"></textarea>
                            </div>
                            <div class="border-bottom my-5" style="height: 30px;">
                            </div>
                            {{-- english --}}
                            <div class="form-group">
                               <label for="">Title (English)</label>
                               <input class="form-control" type="text" name="title_en" placeholder="Default input" required>
                            </div>
                            <div class="form-group">
                               <label for="">Slug (English)</label>
                               <textarea class="form-control" type="text" name="slug_en" placeholder="Post description for preview" style="resize:none;" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="Content">Content (English)</label>
                               <textarea id="htmeditor_en" class="form-control" name="content_en"></textarea>
                            </div>
                            <div class="border-bottom my-5" style="height: 30px;">
                            </div>
                            {{-- russian --}}
                            <div class="form-group">
                               <label for="">Title (Russian)</label>
                               <input class="form-control" type="text" name="title_ru" placeholder="Default input" required>
                            </div>
                            <div class="form-group">
                               <label for="">Slug (Russian)</label>
                               <textarea class="form-control" type="text" name="slug_ru" placeholder="Post description for preview" style="resize:none;" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="Content">Content (Russian)</label>
                               <textarea id="htmeditor_ru" class="form-control" name="content_ru"></textarea>
                            </div>
                            <div class="border-bottom my-5" style="height: 30px;">
                            </div>
                            <div class="form-group d-flex align-items-center">

                                <div>
                                    <img src="" width="200px" alt="post image" id="postImage" class="removable">
                                </div>

                                <div class="custom-file ml-5">
                                   <input type="file" id="postImageInput" class="custom-file-input" name="image" required>
                                   <label class="custom-file-label" for="image">Upload image from your computer</label>
                                </div>
                             </div>
                         </div>
                    </div>

                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            Upload Files
                          </h5>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-file">
                                   <input type="file" class="custom-file-input" name="files[]" multiple>
                                   <label class="custom-file-label" for="validatedCustomFile">თუ ერთზე მეტი ფაილის დამატება გინდა, რამდენიმე ფაილი ერთად მონიშნე</label>
                                </div>
                             </div>
                        </div>
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
