<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('CSS/vistaAnonim.css') }}">
    <title>Renta</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ url('indexEs') }}#QuiSom">¿QUIÉNES SOMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#QueFem">¿QUÉ HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#ComHoFem">¿CÓMO LO HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ route('subvencionesEs') }}">SUBVENCIONES</a></li>
                <li><a><img src="{{ asset('img/GracerLogo.jpg') }}" alt="Logo"></a></li>
                <li class="nav-item"> <a href="{{ route('rentaEs') }}">RENTA</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#Clients">CLIENTES</a></li>
                <li class="nav-item"><a href="">NOTICIAS</a></li>
                <li class="nav-item"><a href="{{ route('clientsEs') }}">CONTACTO</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">IDIOMA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/') }}">Catalán</a>
                        <a class="dropdown-item" href="#">Español</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('login') }}">ÁREA PRIVADA</a></li>
            </ul>
        </div>
    </nav>
</header>
<body>
    <div class="container">
        <h1>Renta</h1>
        <div class="row" id="renta">
            <div class="col-8">
                <p>¿Estás buscando una manera fácil y sin preocupaciones de presentar tu declaración de renta este año? ¡No busques más! En nuestra empresa, te ofrecemos un servicio integral y personalizado que te hará la vida más fácil:</p>
                <p>✅Asesoramiento Experto: Cuenta con el apoyo de nuestros asesores fiscales experimentados que están aquí para responder a todas tus preguntas y guiarte en cada paso del camino.</p>
                <p>💰Maximiza las Deducciones: ¡No dejes dinero sobre la mesa! Nuestros expertos están entrenados para identificar todas las deducciones y créditos a los que puedes tener derecho, garantizando que no pagues más impuestos de los necesarios.</p>
                <p>⏱Ahorro de Tiempo: Olvídate de las largas horas navegando por los formularios. Deja que nos ocupemos de todo el trabajo pesado mientras tú disfrutas de tu tiempo libre.</p>
                <p>💼Servicio Personalizado: Nos adaptamos a tus necesidades individuales y te ofrecemos un trato atento y personalizado que te hará sentir como en casa.</p>
            </div>
            <div class="col-4">
                <img src="{{asset('img/hisenda.jpg')}}" alt="">
            </div>
            <p id="ren">🔒Confidencialidad y Seguridad: Tu información es sagrada para nosotros. Garantizamos la máxima confidencialidad y seguridad de tus datos personales y financieros en todo momento.</p>
        </div>
    </div>
    <div class="container bordes">
        <div class="bordes">
            <h2>CONTACTA Y TEN LA TRANQUILIDAD DE SABER QUE ESTÁS EN BUENAS MANOS.</h2>
        </div>
    </div>
    <div class="container" id="imagenRenta">
        <div id="textrenta">
            <h1>¡Evita errores comunes que podrían costarte dinero!</h1>
            <p>¡No esperes más! Haz la declaración de renta con nosotros y descubre cómo puede ser un proceso sin estrés y sin complicaciones. Contáctanos hoy mismo para más información y reserva tu consulta con uno de nuestros asesores fiscales. ¡Estamos aquí para ayudarte a alcanzar tus objetivos financieros sin ninguna complicación! 🚀</p>
        </div>
    </div>
    <div class="container-parent">
        <div class="container" id="ofertas">
            <h1>Servicio de asesoría en línea te ofrece estrategias de ahorro fiscal adaptadas a tu situación</h1>
            <h3>Planes de Renta</h3>
            <div class="row">
                <div class="col">
                    <div id="preu">
                        <h4>BÁSICA</h4>
                        <h5>30€</h5>
                    </div>
                    <div id="informacio">
                        <ul>
                            <li>Revisión del borrador y aplicación de deducciones.</li>
                            <li>Rendimientos de trabajo y capital mobiliario.</li>
                            <li>Inmuebles a disposición de los titulares.</li>
                            <li>Planes de pensiones.</li>
                            <li>Deducción de vivienda habitual.</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div id="preu">
                        <h4>AUTÓNOMO</h4>
                        <h5>50€</h5>
                    </div>
                    <div id="informacio">
                        <ul>
                            <li>Revisión del borrador y aplicación de deducciones.</li>
                            <li>Rendimientos de trabajo y capital mobiliario.</li>
                            <li>Inmuebles a disposición de los titulares.</li>
                            <li>Planes de pensiones.</li>
                            <li>Deducción de vivienda habitual.</li>
                            <li>Rendimientos de actividades económicas.</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div id="preu">
                        <h4>PATRIMONIO</h4>
                        <h5>80€</h5>
                    </div>
                    <div id="informacio">
                        <ul>
                            <li>Revisión del borrador y aplicación de deducciones.</li>
                            <li>Rendimientos de trabajo y capital mobiliario.</li>
                            <li>Inmuebles a disposición de los titulares.</li>
                            <li>Planes de pensiones.</li>
                            <li>Deducción de vivienda habitual.</li>
                            <li>Rendimientos inmobiliarios (alquileres).</li>
                            <li>Venta de acciones.</li>
                            <li>Criptomonedas.</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
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
                            <li>Revisión del borrador y aplicación de deducciones.</li>
                            <li>Rendimientos de trabajo y capital mobiliario.</li>
                            <li>Inmuebles a disposición de los titulares.</li>
                            <li>Planes de pensiones.</li>
                            <li>Deducción de vivienda habitual.</li>
                            <li>Rendimientos inmobiliarios (alquileres).</li>
                            <li>Venta de acciones.</li>
                            <li>Criptomonedas.</li>
                            <li>Venta de Bienes Inmuebles.</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
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
                            <li>Unidades Familiares</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">
                            Contratar</a></button></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div id="preu">
                        <h4>FUERA DE PLAZO</h4>
                        <h5>50€</h5>
                    </div>
                    <div id="informacio">
                        <ul>
                            <li>Una vez finalizada la Campaña de la Renta</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
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
                            <li>Requerimientos de la Agencia Tributaria</li>
                            <li><button class="accio"><a href="{{ route('contactoRendaEs') }}">Contratar</a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
