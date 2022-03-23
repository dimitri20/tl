<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> TL - ADMIN </title>
    <link rel="shortcut icon" href="{{ asset('storage/globals/main-logo.png') }}" sizes="96x96" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.8/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

</head>
<body class="sidebar-mini" style="height: 100%; min-height: 500px;">
    <div class="wrapper">
       <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <ul class="navbar-nav">
             <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
             </li>
             <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin" class="nav-link">Home</a>
             </li>
             <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.feedback.index') }}" class="nav-link">Feedbacks</a>
             </li>

             <li class="nav-item d-none d-sm-inline-block">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-red">Log Out</button>
                </form>
             </li>
          </ul>
       </nav>

       <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <a href="/admin" class="brand-link">
          <span class="brand-text font-weight-light">Admin Dashboard</span>
          </a>
          <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                   <li class="nav-item">
                      <a href="{{ route("admin.about.index") }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>
                            Abouts
                         </p>
                      </a>
                   </li>

                   <li class="nav-item">
                        <a href="{{ route("admin.backgroundImages.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Background Images
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.contacts.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Contacts
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.posts.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Posts
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.services.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Services
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.servicesContent.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Services Content
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route("admin.team.index") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Team
                        </p>
                        </a>
                    </li>

                </ul>
             </nav>

             {{-- <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item menu-open">
                      <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                         </p>
                      </a>
                      <ul class="nav nav-treeview">
                         <li class="nav-item">
                            <a href="#" class="nav-link active">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Active Page</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="#" class="nav-link">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Inactive Page</p>
                            </a>
                         </li>
                      </ul>
                   </li>
                   <li class="nav-item">
                      <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                         </p>
                      </a>
                   </li>
                </ul>
             </nav> --}}
          </div>
       </aside>


       @yield('content')



       <aside class="control-sidebar control-sidebar-dark" style="display: none;">
          <div class="p-3">
             <h5>Title</h5>
             <p>Sidebar content</p>
          </div>
       </aside>

       <div id="sidebar-overlay"></div>
    </div>


    <script src="{{ asset('js/admin.js') }}"></script>

 </body>
</html>
