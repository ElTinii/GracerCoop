<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('CSS/vistaAnonim.css') }}">
    <title>Renda</title>
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
                <li class="nav-item"><a href="{{ url('/') }}#Clients">CLIENT@S</a></li>
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
        <h1>Renda</h1>
        <div class="row" id="renda">
            <div class="col-8">
                <p>Estàs cercant una manera fàcil i sense preocupacions de presentar la
                    teva declaració de renda aquest any? No busquis més! A la nostra
                    empresa, t'oferim un servei integral i personalitzat que et farà la vida més
                    fàcil:</p>
                    <p>
                        ✅Assessorament Expert: Compta amb el suport dels nostres assessors fiscals experimentats que estan aquí per respondre a totes les teves preguntes i guiar-te en cada pas del camí.
                    </p>
                    <p>💰Maximitza les Deduccions: No deixis diners sobre la taula! Els nostres experts estan entrenats per identificar totes les deduccions i crèdits als quals pots tenir dret, garantint que no paguis més impostos del necessari.</p>
                    <p>⏱Estalvi de Temps: Oblida't de les llargues hores navegant pels formularis. Deixa que ens ocupem de tot el treball pesat mentre tu gaudeixes del teu temps lliure.</p>
                    <p>💼Servei Personalitzat: Ens adaptem a les teves necessitats individuals i t'oferim un tracte atent i personalitzat que et farà sentir com a casa.</p>
                </div>
            <div class="col-4">
                <img src="../img/hisenda.jpg" alt="">
            </div>
            <p id="ren">🔒Confidencialitat i Seguretat: La teva informació és sagrada per a nosaltres. Garantim la màxima confidencialitat i seguretat de les teves dades personals i financeres en tot moment.</p>
        </div>
    </div>
    <div class="container bordes">
        <div class="bordes">
            <h2>CONTACTA I TINGUES LA TRANQUIL·LITAT DE SABER QUE ESTÀS EN BONES MANS.</h2>
        </div>
    </div>
    <div class="container">
        <div id="textrenda">
            <h1>Evita errors comuns que podrien <br> costar-te diners!</h1>
            <p>No esperis més! Fes la declaració de renda amb nosaltres i descobreix com pot ser un procés sense estrès i sense complicacions. Contacta'ns avui mateix per a més informació i reserva la teva consulta amb un dels nostres assessors fiscals. Estem aquí per ajudar-te a assolir els teus objectius financers sense cap complicació! 🚀</p>
        </div>
    </div>
    <div class="container-parent">
    <div class="container" id="ofertas" >
        <h1>Servei d'assessoria en línia t'ofereix estratègies d'estalvi fiscals adaptades a totes les persones fitxant-nos en la teva situació</h1>
        <h3>Plans de Renda</h3>
        <div class="row">
            <div class="col">
                <div id="preu">
                    <h4>BÀSICA</h4>
                    <h5>30€</h5>
                </div>
                <div id="informacio">
                    <ul>
                        <li>Revisió de l'esborrany i aplicació de deduccions.</li>
                        <li>Rendiments de treball i capital mobiliari.</li>
                        <li>Immobles a disposició dels titulars.</li>
                        <li>Plans de pensions.</li>
                        <li>Deducció d'habitatge habitual.</li>
                        <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div id="preu">
                    <h4>AUTÒNOMA</h4>
                    <h5>50€</h5>
                </div>
                <div id="informacio">
                    <ul>
                        <li>Revisió de l'esborrany i aplicació de deduccions.</li>
                        <li>Rendiments de treball i capital mobiliari.</li>
                        <li>Immobles a disposició dels titulars.</li>
                        <li>Plans de pensions.</li>
                        <li>Deducció d'habitatge habitual.</li>
                        <li>Rendiments d’activitats econòmiques.</li>
                        <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div id="preu">
                    <h4>PARTIMONI</h4>
                    <h5>80€</h5>
                </div>
                <div id="informacio">
                    <ul>
                        <li>Revisió de l'esborrany i aplicació de deduccions.</li>
                        <li>Rendiments de treball i capital mobiliari.</li>
                        <li>Immobles a disposició dels titulars.</li>
                        <li>Plans de pensions.</li>
                        <li>Deducció d'habitatge habitual.</li>
                        <li>Rendiments immobiliaris (lloguers)</li>
                        <li>Venda d'accions.</li>
                        <li>Criptomonedes</li>
                        <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div id="preu">
                    <h4>TOTAL</h4>
                    <h5>90€</h5>
                </div>
                <div id="informacio">
                    <ul>
                        <li>Revisió de l'esborrany i aplicació de deduccions.</li>
                        <li>Rendiments de treball i capital mobiliari.</li>
                        <li>Immobles a disposició dels titulars.</li>
                        <li>Plans de pensions.</li>
                        <li>Deducció d'habitatge habitual.</li>
                        <li>Rendiments immobiliaris (lloguers)</li>
                        <li>Venda d'accions.</li>
                        <li>Criptomonedes</li>
                        <li>Venda de Béns Immobles.</li>
                        <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="ofertas2">
        <div class="row">
        <div class="col">
            <div id="preu">
                <h4>CONJUNTA</h4>
                <h5>50€</h5>
            </div>
            <div id="informacio">
                <ul>
                    <li>Unitats Familiars</li>
                    <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div id="preu">
                <h4>FORA DE TERMINI</h4>
                <h5>50€</h5>
            </div>
            <div id="informacio">
                <ul>
                    <li>Una vegada finalitzada la
                        Campanya de la Renda</li>
                    <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div id="preu">
                <h4>COMPLEMENTARIA</h4>
                <h5>50€</h5>
            </div>
            <div id="informacio">
                <ul>
                    <li>Requeriments de l’Agència Tributaria</li>
                    <li><button class="accio"><a href="{{ route('contactoRenda') }}">Contractar</a></button></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>