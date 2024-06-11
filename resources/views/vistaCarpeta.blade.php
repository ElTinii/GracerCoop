<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/navbar.js')}}"></script>
    <script defer type="module" src="{{ asset('js/panell.js') }}"></script>
    <script defer type="module" src="{{ asset('js/dragDrop.js') }}"></script>
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
                        @if (Auth::user()->admin == 1)
                        <a class="dropdown-item" href="/panell">Panell de control</a>
                        @endif
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
            @if (Auth::user()->admin == 1)
            @foreach ($empresas as $empresa)
            <h3 id="sidebar">Empresas</h3>
            <li class="nav-item">
               <a class="nav-link" href="/empresas/{{$empresa->empresa_id}}">{{$empresa->nom}}</a>
            </li>
            @endforeach
            @elseif (Auth::user()->admin == 0)
            <h3 id="sidebar">Carpetas</h3>
            @foreach ($carpetas as $carpeta)
                <li>
                    <a href="/carpetas/{{$carpeta->id}}">{{$carpeta->nom}}</a>
                    @if ($carpeta->subcarpetas->count() > 0)
                        <ul>
                            @foreach ($carpeta->subcarpetas as $subcarpeta)
                                <li><a href="/subcarpetas/{{$subcarpeta->id}}">{{$subcarpeta->nom}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            @endif
      </div>
      <div class="toolbar w-100">
                    <button class="btn mr-2" onclick="window.history.back();">🡠</button>
      @if (isset($id) )
                    <button class="btn mr-2" data-toggle="modal" data-target="#crearCarpeta">Crear Carpeta</button>
                    <button class="btn mr-2" data-toggle="modal" data-target="#pujarFitxer">Pujar Fitxer</button>
        @endif
        </div>
   <div id="page-content-wrapper" class="drop-area">
         <div class="container-fluid xyz">
        <div class="alert alert-danger" hidden="false" id="errors">
            
        </div>
        <div id="missatge" class="alert">

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row" id="carpetas">
            @if (isset($carpetasFilles))
              @foreach ($carpetasFilles as $carpeta)
                <div class="col-md-3">
                    <div class="card">
                    @if (isset ($link))
                        <a href="/carpetasInici/{{$carpeta->carpeta_id}}" id="carpetas">
                        @else
                        <a href="/carpetas/{{$carpeta->carpeta_id}}" id="carpetas">
                        @endif
                        <div class="card-header">
                            <h6>{{$carpeta->nom}}</h6>
                        </div>
                        <div class="card-body">
                        <img src="{{asset('img/folder-2813518_1280.png')}}" id="carp" alt="carpeta"> 
                        </div>
                        </a>
                        <div class="card-footer text-right">
                            @if (!(is_null($carpeta->carpeta_padre)))
                            <button class="btn-danger" data-carpeta-id="{{$carpeta->carpeta_id}}" data-toggle="modal" data-target="#elimCarp"><img src="{{asset('img/eliminar.png')}}" alt="" id="eliminar"></button>
                            @endif
                        </div>
                    </div>
                </div>
              @endforeach
            @endif
            @if (isset($arxius))
              @foreach ($arxius as $arxiu)
                <div class="col-md-3">
                    <div class="card" draggable="true">
                        <div class="card-header">
                            <h6>{{$arxiu->nom}}</h6>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center">
                            @if (Str::endsWith($arxiu->nom, '.pdf'))
                            <img src="{{asset('img/imagen_pdf.png')}}" id="arx" alt="arxiu"> 
                            @elseif (Str::endsWith($arxiu->nom, '.docx'))
                            <img src="{{asset('img/imagen_docx.png')}}" id="arx" alt="arxiu"> 
                            @elseif (Str::endsWith($arxiu->nom, '.png'))
                            <img src="{{asset('img/imagen_png.png')}}" id="arx" alt="arxiu"> 
                            @endif
                        </div>
                        </a>
                        <div class="card-footer text-right">
                            @if (!(is_null($arxiu->carpeta_padre)))
                            <button class="btn-success" id="descargar" data-arxiu-id="{{$arxiu->arxiu_id}}">⬇️</button>
                            <button class="btn-danger" data-arxiu-id="{{$arxiu->arxiu_id}}" data-toggle="modal" data-target="#elimArx"><img src="{{asset('img/eliminar.png')}}" alt="" id="eliminar"></button>
                            @endif
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
        <div class="modal fade" id="elimCarp" tabindex="-1" role="dialog" aria-labelledby="elimCarp" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Estas segur que vols eliminar la carpeta?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="button" id="SielCarp" class="btn btn-success" data-carpeta-id="" @if(isset($id))data-pare-id="{{$id}}"@endif>Si</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pujarFitxer" tabindex="-1" role="dialog" aria-labelledby="pujarFitxer" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form action="/pujarFitxers" method="post" id="fitxers" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-header">
                            <h4>Pujar fitxers</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Seleccioni l'arxiu que vols pujar</h4>
                            <input type="file" name="fitxers" id="fitxers" accept=".png,.pdf,.docx">
                            <input type="text" name="id" id="id" @if(isset($id)) value="{{$id}}" @endif hidden>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tancar</button>
                            <button type="submit" id="btnfitx" class="btn btn-success" data-carpeta-id="">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="elimArx" tabindex="-1" role="dialog" aria-labelledby="emilArx" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Estas segur que vols eliminar l'arxiu?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="button" id="SielArx" class="btn btn-success" data-arxiu-id="" @if(isset($id))data-pare-id="{{$id}}"@endif>Si</button>
                        </div>
                </div>
            </div>
        </div>
</body>
</html>