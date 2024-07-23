<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/vistas.css') }}" rel="stylesheet">
    <title>El meu perfil</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/GracerLogo.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Gracer Coop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                        <a class="dropdown-item" href="">Panell de control</a>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="dropdown-item"><button type="submit">Tancar sessió</button></a>
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>
    <div class="page-container">
    <div class="profile-container">
        <h1>El meu Perfil</h1>
        <label for="username">Username</label><br>
        <input type="text" name="username" value="{{ Auth::user()->username }}" id="formu"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" value="{{ Auth::user()->email }}" id="formu">
        <input type="submit" value="Enviar">
        <a href="{{ route('admin.dashboard') }}"><button class="bg-success text-white">Tornar</button></a>
    </div>
    </div>
</body>
</html>