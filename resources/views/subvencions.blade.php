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
                <li class="nav-item"><a href="{{ url('/') }}#QuiSom">QUI SOM?</a></li>
                <li class="nav-item"><a href="{{ url('/') }}#QueFem">QUI SOM?</a></li>
                <li class="nav-item"><a href="{{ url('/') }}#ComHoFem">COM HO FEM?</a></li>
                <li class="nav-item"><a href="{{ route('subvenciones') }}">SUBVENCIONS</a></li>
                <li><a ><img src="{{ asset('img/GracerLogo.jpg') }}" alt="Logo"></a></li>
                <li class="nav-item"> <a href="{{ route('renda') }}">RENDA</a></li>
                <li class="nav-item"><a href="{{ url('/') }}#Clients">CLIENTS</a></li>
                <li class="nav-item"><a href="{{ route('noticias') }}">NOTICIES</a></li>
                <li class="nav-item"><a href="{{ route('contacto') }}">CONTACTE</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">IDIOMA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Catalá</a>
                        <a class="dropdown-item" href="{{ route('indexEs') }}">Español</a>
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
                <h1>Cercador de Subvencions</h1>
                <h2>Totes les ajudes i subvencions en un sol cercador</h2>
                <p>En Gracer sabem que les ajudes públiques i subvencions són benvingudes i, per això, la necessitat d'estar atents perquè als nostres clients no se'ns escapi cap.</p>
                <p>Per aquest motiu, hem incorporat un potent cercador que et permetrà localitzar les ajudes o subvencions que puguin interessar-te, rebre alertes i tenir informació sobre la tramitació de les mateixes.</p>
                    
                
                <a href="https://gracercoop-subvencions.fandit.es/subvenciones">
                    <button class="contact100-form-btn">
                        ACCÉS 
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
    	<p><a href="{{asset('/resources/Politica de privacitat/POLITICAS_DE_PRIVACIDAD.pdf')}}">Politica de privacitat</a>   Avis legal    Cookies    Contacte</p>
	</footer>
</body>
</html>