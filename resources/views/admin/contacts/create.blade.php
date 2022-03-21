@extends('admin.layouts.index')


@section('content')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">


               <form method="POST" action="{{route('admin.contacts.store')}}">
                @csrf

                    <div class="row my-4">

                        <div class="col-sm-6">
                        <h1 class="m-0">Abouts</h1>
                        </div>

                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </ol>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="language">Select Contact info type</label>

                        <select name="contact_name" class="form-control" required>
                        <option value="mail">mail</option>
                        <option value="phone">phone</option>
                        <option value="physical_address_ka">physical_address_ka</option>
                        <option value="physical_address_en">physical_address_en</option>
                        <option value="physical_address_ru">physical_address_ru</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Content">Contact Info</label>
                        <input class="form-control" type="text" name="contact_info" placeholder="Default input" required>
                    </div>

             </form>

            </div>
         </div>

    </div>


    <script src="{{ asset("/js/htmeditor.min.js") }}"      htmeditor_textarea="htmeditor"      full_screen="no"      editor_height="480"     run_local="no"> </script>
@endsection
