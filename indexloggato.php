<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>

		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<link rel="icon" href="logo.ico">
		<title>MyMagicalPet</title>

		<script src="http://code.jquery.com/jquery-1.5.min.js" type="text/javascript"></script>
		<script src="jquery.carouFredSel-5.6.1.js" type="text/javascript"></script>
		<script src="slider.js" type="text/javascript"></script>
		<script src="js/topbutton.js"></script>

		<link rel="stylesheet" type="text/css" href="index.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

	</head>
	
	<body class="text-center">

		<!-- Bottone Torna Su -->
		<button onclick="topFunction()" id="topButton" title="Torna su" >Torna su</button>
		<div id=home></div>


		<!-- Barra Navigatrice -->

		<nav class="navbar sticky-top" style="background-color: #641C34 ; " id="home">
			<a class="navbar-brand" href="indexloggato.php">
                <img src="immagini/logo_small.png" height="55px" alt="150px">
            </a>
			
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

			<ul>
				<li><a href="#home">Home</a></li>
				<li><a href="#logout">Logout</a></li>
				<li><a href="#domande">Faq</a></li>
				<li><a href="#piede">Contattaci</a></li>
				<li><a href="pagina_utente/utente.php"><?php     
							if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {echo  $_SESSION['username'];
							} else { echo "Please log in first to see this page.";
							}
						?>
					</a> </li>

			  </ul>	
        </nav>

		<br>

		<!-- Logo MyMagicalPet -->
		<div >
			<img src="immagini/logo_large.png" height="120" alt="">
		</div>
		<br>	<h3>Adotta un animale fantastico!!</h3>	<br>
		
		
		<!-- Carosello -->
		<div id="wrapper">
			<div id="bg"></div>
			<div id="carousel">
                <div>
                    <img class="img-front" src="img/111693.png" alt="" >
					<img class="img-back" src="img/cucciolodidrago.jpg" alt="" >
                    <h3>Baby Dragons</h3>
					<p>Dona una casa a un Baby Dragon. Crescilo e Addestralo per poterlo cavalcare e diventare un Signore dei Draghi. (Ci dissociamo  da ogni forma di violenza causata dal cucciolo.) </p>
					<a href="catalogo_animali/catalogo_loggato.html#babydragon" target="_blank">Adottami ora &raquo;</a>
				</div>
				<div >
					<img class="img-front" src="immagini/poro.jpg" alt="">
					<img class="img-back" src="img/poro2.jpg" alt="">
					<h3>Poro, Poro, PORO!!!</h3>
					<p>Originari delle terre gelate Freljord, I Poro sono piccoli esserini sferici ricoperti di pelo. Purtroppo il riscaldamento globale, li ha portati a soffrire la fame. Sbrigati ad addottarne  uno e salviamo la loro specie!! </p>
					<a href="catalogo_animali/catalogo_loggato.html#poro" target="_blank">Adottami ora &raquo;</a>
				</div>

				<div>
					<img class="img-front" src="immagini/flerken.jpg" alt="">
					<img class="img-back" src="img/flerken.jpg" alt="">
					<h3>Flerken</h3>
					<p>Stufi di un semplice gatto? Adotta un Flerken, creature dotate di incredibili poteri: a differenza dei felini depositano uova, e sono dotati di zanne molto aguzze e tentacoli che permettono loro di fare a pezzi in pochi secondi qualsiasi preda. </p>
					<a href="catalogo_animali/catalogo_loggato.html#flerken" target="_blank">Adottami ora &raquo;</a>
				</div>

				<div>
					<img class="img-front" src="img/tartaruga_3.jpg" alt="">
					<img class="img-back" src="img/turtlebonsai.jpg" alt="">
					<h3>Bonsai Turtle</h3>
					<p>Discendente dalle antiche Tartarughe Isola , le Tartarughe Bonsai sono simili alle tartarughe terrestri il cui guscio ?? protetto da un Bonsai Giapponese. </p>
					<a href="catalogo_animali/catalogo_loggato.html#bonsai" target="_blank">Adottami ora &raquo;</a>
				</div>
				<div>
					<img class="img-front" src="img/kitsune.jpg" alt=""> 
					<img class="img-back" src="img/kitsune2.jpg" alt="">
					<h3>Kitsune</h3>
					<p>e' un essere dotato di grande intelligenza, in grado di vivere a lungo e di sviluppare con l'eta' poteri soprannaturali: il principale tra questi ultimi e' l'abilita' di cambiare aspetto e assumere sembianze umane. </p>
					<a href="catalogo_animali/catalogo_loggato.html#kitsune" target="_blank">Adottami ora &raquo;</a>
				</div>
				<div>
					<img class="img-front" src="img/grifon.png" alt="">
					<img class="img-back" src="img/grifon2.jpg" alt="">
					<h3>Grifone</h3>
					<p>e' un essere leggendario con il corpo di leone e la testa d'aquila, con le zampe anteriori d'aquila, dotate di artigli, questo mitico animale indica la conciliazione della forza con la saggezza, forza e vigilanza.</p>
					<a href="catalogo_animali/catalogo_loggato.html#grifone" target="_blank">Adottami ora &raquo;</a>
				</div>
				
			</div>
			<a id="prev" href="#"><span></span></a>
			<a id="next" href="#"><span></span></a>
		</div>
		<br>
		<!-- Fine Carosello -->


		<!--Pulsante Catalogo-->
        <a href="catalogo_animali/catalogo_loggato.html" class="btn btn-primary btn-lg" style="background-color: #641C34 " role="button" >Clicca qui per adottare un MagicalPet!!</a>

		<br><br><br><br id=logout><br><br><br><br><br><br>

		<!-- Logout-->
		<div class="header" >
			<div class="formbox">
				<form action="logout.php" method="post">
				<form id="loginForm">
					<br>        
					<div class="form-group">
							<h2><strong>LOGOUT</strong></h2>
						</div>
						<br>
						<h5> Clicca qui per effettuare il Logout! </h5>
						<br>
						<button type="submit" class="btn btn-primary " style ="background-color: #641C34  "> Logout </button>
				</form>
				</form>
			</div>
		</div>

		<!-- Sezione FAQ-->
		<br id=domande><br>	 <br><br>


		<div class="accordion">
			<div class="title">
				<h1>Domande Frequenti degli utenti </h1>
			</div>
			<div class="footer-copyright text-left py-1"  style="background-color: #641C34 ;">
			</div>
			<br>
			<div class="contentBx">
				<div class="label"><h5>Di cosa si occupa MyMagicalPet ?</h5></div>
				<div class="content">
					<p>MyMagicalPet e' un'organizzazione no profit per la conservazione di tutte le specie di animali da ogni multiverso.</p>
				</div>
				
			</div>

			<div class="contentBx">
				<div class="label"><h5>Come adotto un animale "magico" ?</h5></div>
				<div class="content">
					<p>                  Adottare un MagicalPet e' semplicissimo : <br> se non si e' Registrati basta farlo cliccando in alto a destra, altrimenti effettua il login! <br> Una volta fatto cio' scegli e adotta il tuo MagicalPet nel catalogo!
				</div>
			</div>

			<div class="contentBx">
				<div class="label"><h5>Come e quando ricevero' il mio MagicalPet?</h5></div>
				<div class="content">
				<p>                  Una volta effettuata la scelta del MagicalPet e effettuando una donazione di 3000 $ <br> ( Non si accettano resi e rimborsi per la tutela dell'animale),<br> Il tuo MagicalPet arrivera' tramite la nostra spedizione PolarExpress in totale sicurezza.  
				</div>
			</div>

			<div class="contentBx">
				<div class="label"><h5>Cosa succede se il MagicalPet non mi soddisfa?</h5></div>
				<div class="content">
					<p>                       Provvederemo subito all'abbattimento secondo le norme speciali del multiverso, in perfetta sicurezza e tutela dell'animale. Dopodiche' invieremo a distanza di 3 mesi il tuo nuovo MagicalPet <br>(successivamente al seguito di una piccola donazione di 1500$). 
					</div>
			</div>

			<div class="contentBx">
				<div class="label"><h5>                    Cosa succede se il mio MagicalPet e' malato?
				</h5></div>
				<div class="content">
				<p>                  La nostra organizzazione mette a dispozione 240 Veterinari in tutti i 400 multiversi raggiunti da MyMagicalPet. 
				</p>
				</div>
			</div>
		</div>

		<script>
			const accordion = document.getElementsByClassName('contentBx');
			for (i=0;i<accordion.length;i++){
				accordion[i].addEventListener('click',function(){ this.classList.toggle('active')});
			}
		</script>
		

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<!-- Footer-->  
		
		<footer class="page-footer font-small white" id ="piede">
				<div class="footer-copyright text-center py-1"  style="background-color: #641C34 ;color:white">
				</div>
				<div class="section clearfix" style="background-color: #ffffff;">
					<div class="container">
						<div class="row lp-section-content clearfix">
							<div class="col-sm-12">
								<br>
								<h3>Hai ancora problemi con il tuo MagicalPet? </h3>
								<p>Contattaci attraverso la nostra mail di supporto.</p>
								<div class="calltoaction-right-panel">
									<a href="mailto:supportoclienti@mymagicalpet.com" class="btn btn-primary btn-lg" role="button"style="background-color: #641C34;">Contatta MyMagicalPet!</a>
								</div>
								<br>
							</div>      
						</div>     
					</div>
				</div>
				<div class="footer-copyright text-left py-3"  style="background-color: #641C34 ;color:white"><strong>&nbsp Si ringraziano i soci </strong> John e Giorgio   .
				</div>
		  </footer>
		  <!-- Fine Footer -->
		  
	</body>
</html>
