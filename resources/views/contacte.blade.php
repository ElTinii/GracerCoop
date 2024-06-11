<!DOCTYPE html>
<!-- saved from url=(0054)https://colorlib.com/etc/cf/ContactFrom_v17/index.html -->
<html lang="en" data-lt-installed="true"><head><meta http-equiv="Content-Type"
			content="text/html; charset=UTF-8">
		<title>Contacte</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ asset('CSS/vistaAnonim.css') }}">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/bootstrap.min.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/font-awesome.min.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="./Contact V17_files/animate.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/hamburgers.min.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/animsition.min.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/select2.min.css">
		<link rel="stylesheet" type="text/css"
			href="./Contact V17_files/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="./Contact V17_files/util.css">
		<link rel="stylesheet" type="text/css" href="./Contact V17_files/main.css">

		<meta name="robots" content="noindex, follow">
		<script type="text/javascript" async
			src="./Contact V17_files/analytics.js.descarga"
			nonce="2b63afc2-a327-4731-88f5-9f1336a5690d"></script><script defer
			referrerpolicy="origin"
			src="./Contact V17_files/s.js.descarga"></script><script
			nonce="2b63afc2-a327-4731-88f5-9f1336a5690d">try{(function(w,d){!function(b,c,d,e){b[d]=b[d]||{};b[d].executed=[];b.zaraz={deferred:[],listeners:[]};b.zaraz.q=[];b.zaraz._f=function(f){return async function(){var g=Array.prototype.slice.call(arguments);b.zaraz.q.push({m:f,a:g})}};for(const h of["track","set","debug"])b.zaraz[h]=b.zaraz._f(h);b.zaraz.init=()=>{var i=c.getElementsByTagName(e)[0],j=c.createElement(e),k=c.getElementsByTagName("title")[0];k&&(b[d].t=c.getElementsByTagName("title")[0].text);b[d].x=Math.random();b[d].w=b.screen.width;b[d].h=b.screen.height;b[d].j=b.innerHeight;b[d].e=b.innerWidth;b[d].l=b.location.href;b[d].r=c.referrer;b[d].k=b.screen.colorDepth;b[d].n=c.characterSet;b[d].o=(new Date).getTimezoneOffset();if(b.dataLayer)for(const o of Object.entries(Object.entries(dataLayer).reduce(((p,q)=>({...p[1],...q[1]})),{})))zaraz.set(o[0],o[1],{scope:"page"});b[d].q=[];for(;b.zaraz.q.length;){const r=b.zaraz.q.shift();b[d].q.push(r)}j.defer=!0;for(const s of[localStorage,sessionStorage])Object.keys(s||{}).filter((u=>u.startsWith("_zaraz_"))).forEach((t=>{try{b[d]["z_"+t.slice(7)]=JSON.parse(s.getItem(t))}catch{b[d]["z_"+t.slice(7)]=s.getItem(t)}}));j.referrerPolicy="origin";j.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(b[d])));i.parentNode.insertBefore(j,i)};["complete","interactive"].includes(c.readyState)?zaraz.init():b.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script><style>
			@-webkit-keyframes spin {
				0% { -webkit-transform: rotate(0deg); }
				100% { -webkit-transform: rotate(360deg); }
			}
		
			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}

			input.bito-email-input:-webkit-autofill,
			input.bito-email-input:-webkit-autofill:hover,
			input.bito-email-input:-webkit-autofill:focus {
			  -webkit-text-fill-color: rgb(255, 255, 255);
			  transition: background-color 5000s ease-in-out 0s;
			}
			
			#bito-body::-webkit-scrollbar,
			#emptyDiv-inner::-webkit-scrollbar,
			#loginParentDiv-outer::-webkit-scrollbar {
			  width: 4px;
			  border-radius: 24px;
			  color: #7a8084;
			}
			
			#bito-body::-webkit-scrollbar-thumb,
			#emptyDiv-inner::-webkit-scrollbar-thumb,
			#loginParentDiv-outer::-webkit-scrollbar-thumb {
			  background: #888; 
			}
			
			#bito-body::-webkit-scrollbar-thumb:hover,
			#emptyDiv-inner::-webkit-scrollbar-thumb:hover,
			#loginParentDiv-outer::-webkit-scrollbar-thumb:hover {
			  background: #555; 
			}

			.login-network-error-container {
				padding: 10px 16px 8px;
				color: rgb(255 0 0);
			}		
			
			#loader {
				background-color: #00000085;
				position: absolute;
				width: 100%;
				top: 0px;
				left: 0px;
				height: 300px;
				align-items: center;
				justify-content: center;
				display: grid;
				z-index: 3002;
				opacity: 9999;
			}
			
			.spinner {
			  display: inline-block;
				  width: 1.5rem;
				  height: 1.5rem;
				  vertical-align: text-bottom;
				  border: 1.75px solid #fff;
				  border-right-color: transparent;
				  border-radius: 50%;
				  animation: spinner-border .75s linear infinite;
				  margin-top:-30px
			}
			
			@keyframes spinner-border {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			  }
		</style>
		<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ url('/') }}#QuiSom">QUI SOM?</a></li>
                <li class="nav-item"><a href="{{ url('/') }}#QueFem">QUI SOM?</a></li>
                <li class="nav-item"><a href="{{ url('/') }}#ComHoFem">COM HO FEM?</a></li>
                <li class="nav-item"><a href="{{ route('subvenciones') }}">SUBVENCIONS</a></li>
                <li><a ><img src="{{ asset('img/GRACER3.jfif') }}" alt="Logo"></a></li>
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
</head>
	<body cz-shortcut-listen="true">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<form class="contact100-form validate-form" action="https://formsubmit.co/thos.vazquez.alex@gmail.com" method="POST">
					<input type="hidden" name="_next" value="http://gracercoop/contacte.html">
					<input type="hidden" name="_captcha" value="false">
					<span class="contact100-form-title">
						Contactans
					</span>
					<label class="label-input100" for="first-name">Nom i cognoms</label>
					<div class="wrap-input100 rs1-wrap-input100 validate-input"
						data-validate="Type first name">
						<input id="first-name" class="input100" type="text" name="first-name"
							placeholder="Escriu aqui el nom">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input"
						data-validate="Type last name">
						<input class="input100" type="text" name="last-name"
							placeholder="Escriu aqui el cognom">
						<span class="focus-input100"></span>
					</div>
					<label class="label-input100" for="email">Correu electronic *</label>
					<div class="wrap-input100 validate-input"
						data-validate="Valid email is required: ex@abc.xyz">
						<input id="email" class="input100" type="text" name="email"
							placeholder="Ex. example@email.com">
						<span class="focus-input100"></span>
					</div>
					<label class="label-input100" for="phone">Numero de telèfon</label>
					<div class="wrap-input100">
						<input id="phone" class="input100" type="text" name="phone"
							placeholder="Ex. +34 101010101">
						<span class="focus-input100"></span>
					</div>
					<label class="label-input100" for="message">Missatge *</label>
					<div class="wrap-input100 validate-input"
						data-validate="Message is required">
						<textarea id="message" class="input100" name="message"
							placeholder="Escriu aqui el teu misssatge..."></textarea>
						<span class="focus-input100"></span>
					</div>
					<div class=" validate-input"
						data-validate="Message is required">
						<input type="checkbox" name="politica" id="politica">
						<label class="" for="politica">Accepto la política de protecció de dades</label>
					</div>
					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn">
							Enviar
						</button>
					</div>
				</form>
				<div class="contact100-more flex-col-c-m"
					style="background-image: url(&#39;images/bg-01.jpg&#39;);">
					<div class="flex-w size1 p-b-47">
						<div class="txt1 p-r-25">
							<span class="lnr lnr-map-marker"></span>
						</div>
						<div class="flex-col size2">
							<span class="txt1 p-b-20">
								On som?
							</span>
							<span class="txt2">
								Carrer Escultor Llimona 2,<br> 08210-Barberà del valles
							</span>
						</div>
					</div>
					<div class="dis-flex size1 p-b-47">
						<div class="txt1 p-r-25">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="flex-col size2">
							<span class="txt1 p-b-20">
								Contactans per aqui
							</span>
							<span class="txt3">
								<img src="./recursos/whatsapp.png" id="whats" alt="">+34 616 771 103
							</span>
						</div>
					</div>
					<div class="dis-flex size1 p-b-47">
						<div class="txt1 p-r-25">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="flex-col size2">
							<span class="txt1 p-b-20">
								O per aqui...
							</span>
							<span class="txt3">
								info@gracer.coop
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<footer>
    <p>Politica de privacitat   Avis legal    Cookies    Contacte</p>
</footer>
	</html>