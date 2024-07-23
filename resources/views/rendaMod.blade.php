<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>    
    <script defer type="module" src="{{ asset('js/panell.js')}}"></script>
    <link href="{{ asset('css/vistas.css') }}" rel="stylesheet">
    <script src="{{ asset('js/navbar.js')}}"></script>
    <script defer type="module" src="{{ asset('js/grafic.js')}}"></script>
    <title>Panell de Control</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/GracerLogo.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
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
                <a href="/rendaMod"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span><img src="{{asset('img/modificar.png')}}" alt=""> Modificar Renda</a>
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
                    <h1>Modificar Renda</h1>
                    <div class="row">
                        @foreach ($datosRenda as $renda)
                        <div class="col-2 renda-box">
                            <div class="renda-content">
                                <div class="renda-header">
                                    <h5>{{ $renda->nom }}</h5>
                                    <button class="editar" data-toggle="modal" data-target="#editarRenda" data-id="{{ $renda->id }}" data-nom="{{ $renda->nom}}" data-preu="{{ $renda->preu}}"><img src="{{ asset('img/editar.png') }}" alt="Editar"></button>
                                </div>
                                <p class="renda-price">{{ $renda->preu }}€</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
   </div>

   <div class="modal fade" id="editarRenda" tabindex="-1" role="dialog" aria-labelledby="editarRenda" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="afegir-empresa" method="post" action="/editarRenda">
                    @csrf
                        <div class="modal-header">
                            <h2>Modificar preu</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="id" class="id" hidden>
                            <label for="nom">Nom de l'oferta</label>
                            <input type="text" name="nom" id="formu" class="nom" disabled>
                            <label for="correu">Preu</label>
                            <input type="text" name="preu" id="formu" class="preu">
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
</body>
</html>