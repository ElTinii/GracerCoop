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
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
            @foreach($empresas as $empresa)
                <li class="active">
                    <a href="/carpetasEmpresa/{{$empresa->empresa_id}}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span><img src="" alt=""> {{$empresa->nom}}</a>
                     <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                    </ul>
                 </li>
            @endforeach
      </div>
   <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
              @foreach ($empresas as $empresa)
                    <div class="col-md-4">
                    <a href="/carpetasEmpresa/{{$empresa->empresa_id}}" id="carpetas">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$empresa->nom}}</h4>
                        </div>
                        <div class="card-body">
                            @if($empresa->img == null)
                                <img src="{{asset('img/folder-2813518_1280.png')}}" id="carp" alt="">
                            @else
                                <img src="{{asset('img/$empresa->imatge')}}" id="carp" alt=""> 
                            @endif
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                    </a>
                </div>
              @endforeach
            </div>
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
   </div>
</body>
</html>