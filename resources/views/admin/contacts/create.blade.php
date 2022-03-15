@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
               <div class="row my-4">
                  <div class="col-sm-6">
                     <h1 class="m-0">Abouts</h1>
                  </div>

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("admin.contacts.store")}}"><i class="fa fa-plus" aria-hidden="true"></i><span class="ml-2">Create</span></a></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>

         <div class="container">


            <form>

                <div class="form-group">
                   <label for="language">Select Language (Select ka if there are no other translations for this text)</label>
                    {{-- mgoni araa sachiro --}}
                   <select class="form-control">
                      <option>ka</option>
                      <option>en</option>
                      <option>ru</option>
                   </select>
                </div>

                <div class="form-group">
                    <label for="language">Select Contact info type</label>

                    <select class="form-control">
                       <option>mail</option>
                       <option>phone</option>
                       <option>physical_address_ka</option>
                       <option>physical_address_en</option>
                       <option>physical_address_ru</option>
                    </select>
                 </div>

                <div class="form-group">
                   <label for="Content">Contact Info</label>
                   <input class="form-control" type="text" placeholder="Default input">
                </div>

             </form>

         </div>


    </div>


    <script src="{{ asset("/js/htmeditor.min.js") }}"      htmeditor_textarea="htmeditor"      full_screen="no"      editor_height="480"     run_local="no"> </script>
@endsection
