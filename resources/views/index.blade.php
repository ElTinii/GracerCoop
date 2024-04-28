<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script type="module" src="./js/mostrar.js"></script>
    <title>Gracer Coop</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="#QuiSom">QUI SOM?</a></li>
                <li class="nav-item"><a href="#QueFem">QUÈ FEM?</a></li>
                <li class="nav-item"><a href="#ComHoFem">COM HO FEM?</a></li>
                <li class="nav-item"><a href="#Clients">CLIENTS</a></li>
                <li><a href="./index.html"><img src="{{ asset('img/GRACER3.jfif') }}" alt="Logo"></a></li>
                <li class="nav-item"><a href="./subvencions.html">SUBVENCIONS</a></li>
                <li class="nav-item"><a href="{{ route('contacte') }}">CONTACTE</a></li>
                <li class="nav-item"><a href="">NOTICIES</a></li>
                <li class="nav-item"> <a href="./renda.html">RENDA</a></li>
                <li class="nav-item"><a href="">IDIOMA</a></li>
                <li class="nav-item"><a href="{{ route('login') }}">Area Privada</a></li>
            </ul>
        </div>
    </nav>
</header>
<body>
    <div id="inici">
        <div id="slogan" class="dreta">
            <h1>LA TEVA TRANQUILITAT, LA NOSTRA PRIORITAT: <br>
                Assessoria propera i de confiança</h1>
        </div>
    </div>
    <div class="centre principal" id="QuiSom">
        <div class="centrar">
            <div>
                <h1>Qui som</h1>
            </div>
            <p>Som un equip de professionals amb gran experiència en el món de l&#39;empresa, la consultoria,
                l&#39;assessoria i la formació que després de diferents col·laboracions decidim organitzar-nos
                formant GRACER COOP. Una Societat Cooperativa de Treballat Associat sense ànim de lucre
                per creure en aquest model d&#39;empresa per ser les persones l&#39;actiu principal. Apostem per
                l&#39;Economia Social com a model empresarial sostenible i generador d&#39;ocupació.
                El nostre assessorament empresarial entès com a servei d&#39;acompanyament a persones que
                volen construir empreses transformant idees i il·lusions en realitat.
                Els nostres clients són empreses i organitzacions de l&#39;àmbit cooperatiu i social, PYMES i
                autònoms.</p>
        </div>
    </div>
    <div id="QueFem">
        <h1>Que fem?</h1>
        <div class="row align-items-stretch">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h5><img src="{{ asset('img/Laboral.jpg') }}" alt="">Laboral</h5>
                        <div class="col h-400 mb-4 fem" id="laboral">
                            <ul>
                                <li>
                                Gestió de nòmines i Seguros socials.
                                </li>
                                <li>
                                Assessorament en matèria de relacions laborals i conflictes laborals.
                                </li>
                                <li>
                                Gestió d’expedients de contractació i acomiadaments.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5><img src="{{ asset('img/RecursosHumans.jpg') }}" alt="">Recursos Humans</h5>
                        <div class="col h-400 mb-4 fem" id="recursos">
                            <ul>
                                <li>Selecció de personal</li>
                                <li>Resolució de conflictes</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5> <img src="{{ asset('img/Fiscal.jpg') }}" alt="">Fiscal</h5>
                        <div class="col h-400 mb-4 fem" id="fiscal">
                            <ul>
                                <li>Planificació fiscal per a minimitzar la càrrega impositiva.</li>
                                <li>Preparació i presentació d'impostos.</li>
                                <li>Representació davant l'administració tributària en procediments</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5> <img src="{{ asset('img/Contabilidad.jpg') }}" alt="">Comptabilitat</h5>
                        <div class="col h-400 mb-4 fem" id="comptabilitat">
                            <ul>
                                <li>Gestió de la comptabilitat.</li>
                                <li>Elaboració d'estats financers i comptes anuals.</li>
                                <li>Anàlisi d'estats financers i ràtios financers.</li>
                                <li>Implementació de millores en sistemes comptables i de gestió financera.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5><img src="{{ asset('img/societari.jpg') }}" alt="">Societari</h5>
                        <div class="col h-400 fem mb-4" id="societari">
                            <ul>
                                <li>Constitució i dissolució de societats.</li>
                                <li>Redacció i modificació d'estatuts socials i acords de socis.</li>
                                <li>Compliment d'obligacions societàries.</li>
                                <li>Acompanyament a la incorporació societària</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5> <img src="{{ asset('img/Subvencions.jpg') }}" alt="">Subvencions</h5>
                        <div class="col h-400 fem mb-4" id="subvencions">
                            <ul>
                                <li>Acompanyament en la petició i seguiment posterior.</li>
                                <li>Orientació especialitzada</li>
                                <li>Recerca de subvencions</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5> <img src="{{ asset('img/Acompanyament economic.jpg') }}" alt="">Acompanyament econòmic</h5>
                        <div class="col h-400 fem mb-4" id="acompanyament">
                            <ul>
                                <li>Acompanyament en la gestió integral</li>
                                <li>Anàlisi de la realitat econòmica de l'empresa</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <h5> <img src="{{ asset('img/Particular.jpg') }}" alt="">Particulars</h5>
                        <div class="col h-400 fem mb-4" id="particulars">
                            <ul>
                                <li>Declaracions de renda i patrimoni</li>
                                <li>Contractes entre particulars</li>
                                <li>Declaració Impost Transmissions patrimonials</li>
                                <li>Certificats Digitals</li>
                                <li>Requeriments Hisenda</li>
                                <li>Assessorament en temes fiscals</li>
                                <li>Assessorament en temes laboral</li>
                                <li>Subvencions</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row principal centrem" id="ComHoFem">
        <div class="cercle">
            <h1>Com ho fem?</h1>
        </div>
            <div class="pad">
            <p>La nostra diferenciació es basa en la nostra expertesa i proximitat amb el client. En
                l&#39;especialització en Cooperatives. En un assessorament integral a empreses, aportant valor
                mitjançant els nostres serveis. Un marcat perfil Social, posem a les persones en primer pla,
                entenent la fortalesa de la col·laboració amb l&#39;entorn sent la cooperació, la igualtat, el respecte
                i el treball conjunt de les nostres bases d&#39;actuació.
                Creiem en models canviants i adaptats a la societat per a cobrir necessitats existents amb
                innovació, creativitat i generació de valor.</p>
        </div>
    </div>
        <h1>Els nostres clients</h1>
        <div id="clients" class="carousel slide" data-ride="carousel">
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
                    <a href="https://www.mixite.cat/"><img src=" {{ asset('img/Recurso 7.png') }}" alt="Mixité"></a>
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
    <p>Politica de privacitat   Avis legal    Cookies    Contacte</p>
</footer>
</html>