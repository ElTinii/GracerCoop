<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <link href="{{ asset('css/vistas.css') }}" rel="stylesheet">
    <script src="{{ asset('js/navbar.js')}}"></script>
    <script defer type="module" src="{{ asset('js/panell.js') }}"></script>
    <title>Panell de Control</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/GRACER3.jfif') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Gracer Coop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" style="padding-right:20px;">
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
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li class="active">
               <a href="/panell"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span><img src="{{asset('img/home_icon24.png')}}" alt=""> Home</a>
            </li>
            <li>
               <a href="/empresas"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span><img src="{{asset('img/icon_empresa.png')}}" alt=""> Empresas</a>
            </li>
            <li>
               <a href="/logs"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span><img src="{{asset('img/log_icon.png')}}" alt="">Logs</a>
            </li>
            <li>
               <a href="/missatges"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span><img src="{{asset('img/icon_message.png')}}" alt=""> Missatges</a>
            </li>
         </ul>
      </div>
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col">   
                        <h1>Empresas</h1>
                        <button type="button" class="btn btn-outline-dark mt-3 w-100" data-toggle="modal" data-target="#afegirEmpresa">Afegir empresa</button>
                        @error('correu')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror                   
                        @if(isset($empresa) && isset($usuaris))
                        <div id="empresaInfo">
                            <h4>Informacio de l'empresa</h4>
                            <div class="row">
                                <div class=col>
                                    <h5>Empresa: {{$empresa->nom}}</h5>
                                    <p>Imatge:</p>
                                    <p>p</p>
                                    <p>Ultima Modificacio:</p>
                                    <p>{{$empresa->updated_at}}</p>
                                    <p>Creat: </p>
                                    <p>{{$empresa->created_at}}</p>
                                    <button>Editar</button>
                                </div>
                                @foreach($usuaris as $usuari)
                                <div class=col>
                                    <div>
                                        <h5>Usuari: {{$usuari->username}}</h5>
                                        <p>Correu: </p>
                                        <p>{{$usuari->email}}</p>
                                        <p>Ultima Modificacio:</p>
                                        <p>{{$usuari->updated_at}}</</p>
                                        <p>Dia de creacio: </p>
                                        <p>{{$usuari->created_at}}</p>
                                        <button>Editar</button>
                                    </div>
                                </div>
                                @endforeach
                                @if($usuaris->count() < 2)
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div>
                                        <button class="btn-success" data-toggle="modal" data-target="#usuari">Afegir usuari</button>
                                    </div>
                                </div>
                                @endif
                                @if($usuaris->count() < 3)
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div>
                                        <button class="btn-success" data-toggle="modal" data-target="#usuari">Afegir usuari</button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endif
                        <h2>Llistat d'empresas</h2>
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Usuari 1</th>
                                    <th>Usuari 2</th>
                                    <th>Usuari 3</th>
                                    <th>Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($empresas as $empresa)
                                <tr data-empresa-id="{{$empresa->empresa_id}}" id="filaEmpresa" class="clickable">
                                    <td>{{ $empresa->nom }}</td>
                                    @php
                                        $usuarisEmpresa = $usuaris->where('empresa_id', $empresa->empresa_id);
                                    @endphp
                                        @foreach($usuarisEmpresa as $usuari)
                                            @if($usuari->empresa_id == $empresa->empresa_id)
                                            <td>Username: {{ $usuari->username }}</td>
                                            @endif
                                        @endforeach
                                        @if($usuarisEmpresa->count() < 2)
                                            <td></td>
                                        @endif
                                        @if($usuarisEmpresa->count() < 3)
                                            <td></td>
                                        @endif
                                    <td>
                                        <div class="row">
                                            <button class="btn btn-danger" data-empresa-id="{{ $empresa->empresa_id }}" id="accions" data-toggle="modal" data-target="#elimEmp">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal per crear una empresa -->
    <div class="modal fade" id="afegirEmpresa" tabindex="-1" role="dialog" aria-labelledby="afegirEmpresa" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="afegir-empresa" method="post" action="{{ route('panel.store') }}">
                    @csrf
                        <div class="modal-header">
                            <h2>Afegir una empresa</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="nom">Nom de l'empresa</label>
                            <input type="text" name="nom" id="formu" :value="old('nom')">
                            <label for="correu">Correu electronic</label>
                            <input type="email" name="correu" id="formu" :value="old('correu')">
                            @error('correu')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tancar</button>
                            <button type="submit" id="afegir" class="btn btn-success">Afegir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- Modal per la confirmacio d'eliminar empresa -->
        <div class="modal fade" id="elimEmp" tabindex="-1" role="dialog" aria-labelledby="elimEmp" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="afegir-empresa" method="post" action="">
                    @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Estas segur que vols eliminar l'empresa?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="button" id="Siel" class="btn btn-success" data-empresa-id="">Si</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- Modal per afegir un usuari -->
        <div class="modal fade" id="usuari" tabindex="-1" role="dialog" aria-labelledby="usuari" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="afegir-usuari" method="post" action="/empresa/afegir">
                    @csrf
                        <div class="modal-header">
                            <h2>Afegir un usuari</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="nom">Username</label>
                            <input type="text" name="nom" id="formu" :value="old('nom')">
                            <label for="correu">Correu electronic</label>
                            <input type="email" name="correu" id="formu" :value="old('correu')">
                            @if(isset($empresa))
                            <input type="text" value="{{$empresa->empresa_id}}" hidden disabled>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tancar</button>
                            <button type="submit" id="afegir" class="btn btn-success">Afegir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            let table = new DataTable('#myTable');
        </script>
</body>
</html>