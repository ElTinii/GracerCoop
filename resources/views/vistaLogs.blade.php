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
                        <h1>Logs</h1>
                        <div>
                        @if(isset($log))
                        <div>
                            <h4>Informacio dels logs</h4>
                            <div class="col">
                                <p>Client: {{$nomUser}}</p>
                                <p>Accio: {{$log->accio}}</p>
                                <p>Data: {{$log->data}}</p>
                                <p>Hora: {{$log->hora}}</p>
                                <p>IP: {{$log->ipClient}}</p>
                            </div>
                        </div>
                        @endif
                        </div>
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>Client Id</th>
                                    <th>Acció</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Ip client</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($logs as $log)
                                <tr class="clickable-row" data-log-id="{{$log->log_id}}" id="filaLogs{{$log->log_id}}">
                                    <td>{{ $log->client_id }}</td>
                                    <td>{{ $log->accio }}</td>
                                    <td>{{$log->data}}</td>
                                    <td>{{$log->hora}}</td>
                                    <td>{{$log->ipClient}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            let table = new DataTable('#myTable');
        </script>
</body>
</html>