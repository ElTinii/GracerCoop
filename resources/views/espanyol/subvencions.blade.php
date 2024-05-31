<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Contact V17_files/main.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('CSS/vistaAnonim.css') }}">
    <title>Subvencions</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ url('indexEs') }}#QuiSom">QUIENES SOMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#QueFem">QUÉ HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#ComHoFem">CÓMO LO HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ route('subvencionesEs') }}">SUBVENCIONES</a></li>
                <li><a href="./index.html"><img src="{{ asset('img/GRACER3.jfif') }}" alt="Logo"></a></li>
                <li class="nav-item"> <a href="{{ route('rentaEs') }}">RENTA</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#Clients">CLIENTES</a></li>
                <li class="nav-item"><a href="">NOTICIAS</a></li>
                <li class="nav-item"><a href="{{ route('clientsEs') }}">CONTACTO</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">IDIOMA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/') }}">Catalá</a>
                        <a class="dropdown-item" href="#">Español</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('login') }}">AREA PRIVADA</a></li>
            </ul>
        </div>
    </nav>
</header>   
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Buscador de Subvencions</h1>
                <h2>Busca i troba totes les ajudes y subvencions en un sol buscador</h2>
                <p>En Gracer sabem que les ajudes públiques i subvencions són benvingudes, i per això la necessitat d'estar atents perquè als nostres clients no se'ns escapi cap.</p>
                <p>Per això, hem incorporat un potent cercador que et permetrà localitzar les ajudes o subvencions que puguin interessar-te, rebre alertes i tenir informació sobre la tramitació de les mateixes.</p>
                    
                
                <a href="https://gracercoop-subvencions.fandit.es/subvenciones">
                    <button class="contact100-form-btn">
                        Access
                    </button>
                </a>
            </div>
            <div class="col-4">
                <iframe src="https://gracercoop-subvencions.app.fandit.es/landing/gracercoop-subvencions" width="400px" height="530px" style="border-width: 0px;">
                </iframe>
            </div>
        </div>
    </div>
    <footer>
        <p>Politica de privacitat   Avis legal    Cookies    Contacte</p>
    </footer>
</body>
</html>