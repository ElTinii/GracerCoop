<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/vistas.css') }}" rel="stylesheet">
    <title>Part Privada</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/GRACER3.jfif') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Gracer Coop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::check() ? Auth::user()->username : 'Guest' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">Home</a>
                        <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                        <a class="dropdown-item" href="/panell">Panell de control</a>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Tancar sessió</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>
<div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <h3 id="sidebar">Empresas</h3>
            
      </div>
   <div id="page-content-wrapper">
         <div class="container-fluid xyz">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         @if (((Auth::user()->admin)) || Str::startsWith("resources/empresas/$nomEmpresa/CPersonal",$ruta) )
                <button class="btn-success" data-toggle="modal" data-target="#crearCarpeta">Crear Carpeta</button>
                <input type="file" name="fitxer" id="fitxer">
        @endif
            <div class="row">
            @if (isset($carpetasFilles))
              @foreach ($carpetasFilles as $carpeta)
                <div class="col-md-4">
                    <div class="card">
                    @if (isset ($link))
                        <a href="/carpetasInici/{{$carpeta->carpeta_id}}" id="carpetas">
                        @else
                        <a href="/carpetas/{{$carpeta->carpeta_id}}" id="carpetas">
                        @endif
                        <div class="card-header">
                            <h4>{{$carpeta->nom}}</h4>
                        </div>
                        <div class="card-body">
                        <img src="{{asset('img/folder-2813518_1280.png')}}" id="carp" alt="carpeta"> 
                        </div>
                        </a>
                        <div class="card-footer text-right">
                            <button class="btn-danger" idateid="{{$carpeta->carpeta_id}}"><img src="{{asset('img/eliminar.png')}}" alt="" id="eliminar"></button>
                        </div>
                    </div>
                </div>
              @endforeach
            @endif
            </div>
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
   </div>
   <div class="modal fade" id="crearCarpeta" tabindex="-1" role="dialog" aria-labelledby="crearCarpeta" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="addCarp" method="post" action="/crearCarpeta">
                    @csrf
                        <div class="modal-header">
                        <h2>Crear Carpeta</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="nomCarpeta" id="formu" placeholder="Escriu el nom de la carpeta">
                            <input type="text" value="{{Auth::user()->empresa_id}}" hidden>
                            @if(isset($id))
                            <input type="text" name="id" id="id" value="{{$id}}" hidden>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btnCrear" class="btn btn-success" data-empresa-id="">Crear Carpeta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>