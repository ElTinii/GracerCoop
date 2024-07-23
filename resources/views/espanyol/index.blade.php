<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('CSS/vistaAnonim.css') }}">
    <title>Inici</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ url('indexEs') }}#QuiSom">QUIENES SOMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#QueFem">QUÉ HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#ComHoFem">CÓMO LO HACEMOS?</a></li>
                <li class="nav-item"><a href="{{ route('subvencionesEs') }}">SUBVENCIONES</a></li>
                <li><a ><img src="{{ asset('img/GracerLogo.jpg') }}" alt="Logo"></a></li>
                <li class="nav-item"> <a href="{{ route('rentaEs') }}">RENTA</a></li>
                <li class="nav-item"><a href="{{ url('indexEs') }}#Clients">CLIENTES</a></li>
                <li class="nav-item"><a href="">NOTICIAS</a></li>
                <li class="nav-item"><a href="{{ route('clientsEs') }}">CONTACTO</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">IDIOMA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/') }}">CATALÁN</a>
                        <a class="dropdown-item" href="#">EESPAÑOL</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('login') }}">AREA PRIVADA</a></li>
            </ul>
        </div>
    </nav>
</header>
<body>
    <div id="inici">
        <div id="slogan" class="dreta">
            <h1>TU TRANQUILIDAD, NUESTRA PRIORIDAD: <br>
                Assessoria próxima y de confianza </h1>
        </div>
    </div>
    <div class="centre principal" id="QuiSom">
        <div class="centrar">
            <div>
                <h1>Quienes somos?</h1>
            </div>
            <p>Somos un equipo de profesionales con gran experiencia en el mundo de la empresa, la consultoria,
                la assesoría y la formación  que después de diferentes colaboraciones decidimos organizarnos
                formando GRACER COOP. Una Sociedad Cooperativa de Trabajado Asociado sin ánimo de lucro
                por creer en este modelo de empresa por ser las personas el activo principal. Apostamos por
                la Economía Social como modelo empresarial sostenible y generador de empleo.
                Nuestro asesoramiento empresarial entendido como servicio de acompañamiento a personas; que
                quieren construir empresas transformando ideas e ilusiones en realidad.
                Nuestros clientes son empresas y organizaciones del ámbito cooperativo y social, PYMES y
                autónomos.</p>
        </div>
    </div>
    <div id="QueFem">
        <h1>Qué hacemos?</h1>
        <div class="row align-items-stretch">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h5 class="fem"><img  src="{{ asset('img/Laboral.jpg') }}" alt="">Laboral</h5>
                        <div class="col h-400 mb-4 fem" id="laboral">
                            <ul>
                                <li>
                                Gestión de nómines y Seguros sociales.
                                </li>
                                <li>
                                Asesoramiento en materia de relaciones laborales y conflictos laborales.
                                </li>
                                <li>
                                Gestión de expedientes de contractación y despidos.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5 class="fem"><img src="{{ asset('img/RecursosHumans.jpg') }}" alt="">Recursos Humanos</h5>
                        <div class="col h-400 mb-4 fem" id="recursos">
                            <ul>
                                <li>Selección de personal</li>
                                <li>Resolución de conflictos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5 class="fem"> <img src="{{ asset('img/Fiscal.jpg') }}" alt="">Fiscal</h5>
                        <div class="col h-400 mb-4 fem" id="fiscal">
                            <ul>
                                <li>Planificación fiscal para minimizar la carga impositiva.</li>
                                <li>Preparación y presentación de impuestos.</li>
                                <li>Representación delante de la administración tributària en procedimentos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5 class="fem"> <img src="{{ asset('img/Contabilidad.jpg') }}" alt="">Contabilidad</h5>
                        <div class="col h-400 mb-4 fem" id="comptabilitat">
                            <ul>
                                <li>Gestión de la contabilidad.</li>
                                <li>Elaboración de estados financieros y cuentas anuales.</li>
                                <li>Análisis de estados financieros y ratios financieros.</li>
                                <li>Implementación de mejoras en sistemas contables y de gestió financera.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col hov">
                        <h5 class="fem"><img src="{{ asset('img/societari.jpg') }}" alt="">Societario</h5>
                        <div class="col h-400 fem mb-4" id="societari">
                            <ul>
                                <li>Constitución y disolución de sociedades.</li>
                                <li>Redacción y modificación de estatutos sociales y acuerdos entre socios.</li>
                                <li>Cumplimiento de obligaciones societárias.</li>
                                <li>Acompañamiento  a la incorporación societária</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col hov">
                        <h5 class="fem"><img src="{{ asset('img/Subvencions.jpg') }}" alt="">Subvenciones</h5>
                        <div class="col h-400 fem mb-4" id="subvencions">
                            <ul>
                                <li>Acompañamiento en la petición y seguimiento posterior.</li>
                                <li>Orientación especializada</li>
                                <li>Busqueda de subvenciones</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col hov">
                        <h5 class="fem"> <img src="{{ asset('img/Acompanyament economic.jpg') }}" alt="">Acompañamiento económico</h5>
                        <div class="col h-400 fem mb-4" id="acompanyament">
                            <ul>
                                <li>Acompañamiento  en la gestión integral</li>
                                <li>Análisis de la realidad económica de la empresa</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col hov">
                        <h5 class="fem"> <img src="{{ asset('img/Particular.jpg') }}" alt="" >Particulares</h5>
                        <div class="col h-400 fem mb-4" id="particulars">
                            <ul>
                                <li>Declaraciones de renta y patrimonio</li>
                                <li>Contractos entre particulares</li>
                                <li>Declaración Impost Transmisiones patrimoniales</li>
                                <li>Certificados Digitales</li>
                                <li>Requerimentos Hacienda</li>
                                <li>Asesoramiento en temas fiscal</li>
                                <li>Asesoramiento en temas laborales</li>
                                <li>Subvenciones</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row principal centrem" id="ComHoFem">
        <div class="cercle">
            <h1>Cómo lo hacemos?</h1>
        </div>
            <div class="pad">
            <p>Nuestra diferenciación se basa en nuestra pericia y proximidad con el cliente. En
                especialización en Cooperativas.
                Un marcado perfil Social, ponemos a las personas en primer plano,
                entendiendo la fortaleza de la colaboración con el entorno siendo la cooperación, la igualdad, el respeto
                y el trabajo conjunto de nuestras bases de actuación.
                Creemos en modelos cambiantes y adaptados a la sociedad para cubrir necesidades existentes con
                innovación, creatividad y generación de valor.</p>
        </div>
    </div>
        <h1>Clientes</h1>
        <div id="Clients" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="centrem">
                    <a href="https://www.meseducacio.coop/"><img src="{{ asset('img/Logo +Educació.png') }}" alt="+Educacio"></a>
                    <a href="https://blinkvideo.es/"><img src="{{ asset('img/Blink_Full_Logo_cat.png') }}" alt="Blink"></a>
                    <a href="https://habicoop.cat/"><img src="{{ asset('img/Logo Habicoop amb lletres.JPG') }}" alt="Habicoop"></a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="centrem">
                    <a href="https://www.mixite.cat/"><img src="{{ asset('img/Recurso 7.png') }}" alt="Mixité"></a>
                    <a href="https://lleurequalia.cat/"><img src="{{ asset('img/Qualia_logos_posit.png') }}" alt="Qualia"></a>
                    <a href="https://www.polellmontseny.com/"><img src="{{ asset('img/MARCA_EL POLELL (1).jpg') }}" alt="El Polell"></a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="centrem">
                    <a href="https://ignia.cat/"><img src="{{ asset('img/logotip_positiu.png') }}" alt="ignia"></a>
                    <a href="https://plataformajoveslescorts.wordpress.com/"><img src="{{ asset('img/LogoPlataformaCOLOR-01.png') }}" alt="plataformajoveslescorts"></a>
                    <a href="https://instituciobalmes.wordpress.com/"><img src="{{ asset('img/Logo_Institucio (1).JPG') }}" alt="institucio balmes"></a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="centrem">
                    <a href="https://fundacioseira.coop/"><img src="{{ asset('img/Logo Seira.png') }}" alt="Siera"></a>
                    <a href="https://gatuari.cat/"><img src="{{ asset('img/logo gran sense fons.png') }}" alt="gatuari"></a>
                    <a href="https://afadisbaixmontseny.org/"><img src="{{ asset('img/logo alta resolució.jpg') }}" alt="afadis"></a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="centrem">
                    <a href="https://www.meseducacio.coop/"><img src="{{ asset('img/CDJ-logo-03.jpg') }}" alt="CDJ"></a>
                    <a href="https://www.remenat.org/"><img src="{{ asset('img/drawing.png') }}" alt="remenat"></a>
                    <a href="https://www.cooperativestreball.coop/"><img src="{{ asset('img/Cooperatives de Treball.jpg') }}" alt="Cooperatives de Treball"></a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#clients" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#clients" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
</body>
<footer>
    <p>Politica de privacidad   Aviso legal    Cookies    Contacto</p>
</footer>
</html>