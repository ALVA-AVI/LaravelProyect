<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield('title')
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Font Awesome -->
  {!! Html::style('js/plugins/fontawesome-free/css/all.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('js/plugins/ekko-lightbox/ekko-lightbox.css') !!}

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  {!! Html::style('css/adminlte.min.css') !!}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--link rel="icon" href="{{ asset('img/2017/04/cropped-LOGO-32x32.png" sizes="32x32') }}">
  <link rel="icon" href="{{ asset('img/2017/04/cropped-LOGO-192x192.png" sizes="192x192') }}"-->
  <link rel="icon" href="{{ asset('img/2017/04/cropped-LOGO-32x32.png') }}" sizes="32x32">
  @yield('links')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
      <!--li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li-->
    </ul>

    <!-- SEARCH FORM -->
    <!--form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Cerrar Sesiión
          <i class="nav-icon fa fa-sign-out-alt"></i>
        </a>
      </li>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
       @csrf
   </form>

    </ul>
  </nav>
  <!-- /.navbar -->

  {{-- Form Logout --}}
  {{-- End Form --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('img/2017/04/cropped-LOGO-32x32.png') }}"
           alt="Admin Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8;">
      <span class="brand-text font-weight-light">RESTAURACION N.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{!!asset('img/user2-160x160.jpg')!!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <!--a href="" class="d-block">Administrador</a-->
          <a href="#"class="d-block">{!!Auth::user()->name!!}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- Categorias    --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-alt"></i>
              <p>
                Categorias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Publicaiones --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-bullhorn"></i>
              <p>
                Publicaiones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('registros.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('registros.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Publicaciones--}}

          {{-- Temas Candidatos --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-id-badge"></i>
              <p>
                Candidatos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('candidatos.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('candidatos.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Candidatos --}}

          {{-- Temas Comites --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Comite
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('comites.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('comites.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Comites --}}

          {{-- Temas Consulta --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-file-invoice"></i>
              <p>
                Tema Consultas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('temas.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('temas.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Temas Consultas --}}

          {{-- Banners --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-clone"></i>
              <p>
                Banners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('banners.create') }}" class="nav-link">   <!--- Modificado  route('categories.create')}}-->
                  <i class="far fas fa-plus "></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('banners.index') }}" class="nav-link"> <!--- Modificado route('categories.index')}}-->
                  <i class="far fas fa-list-ol "></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Banners --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('title')
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!--@*if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert" >
        <ul>
          @*foreach ($errors->all() as $error)
              <li>{*{$error}}</li>
          @*endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </ul>
      </div>
      @*endif-->
      @yield('content')
    </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 - 2021 <a href="{{ route('index') }}">RESTAURACION NACIONAL</a>.</strong> Todos los Derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{!! Html::script('js/plugins/jquery/jquery.min.js') !!}
{!! Html::script('js/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
{!! Html::script('js/plugins/filterizr/jquery.filterizr.min.js') !!}
{!! Html::script('js/plugins/ekko-lightbox/ekko-lightbox.min.js') !!}
{!! Html::script('https://unpkg.com/axios/dist/axios.min.js') !!}
{!! Html::script('https://cdn.jsdelivr.net/npm/sweetalert2@9') !!}
{!! Html::script('js/app.js') !!}
{!! Html::script('js/adminlte.min.js') !!}
{!! Html::script('js/demo.js') !!}
{!! Html::script('js/plugins/filterizr/jquery.filterizr.min.js') !!}
@yield('scripts')
</body>
</html>
