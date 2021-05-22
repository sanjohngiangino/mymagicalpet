<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>  
        <link rel="icon" href="../logo.ico">
        <title>MyMagicalPet - Pagina Utente di  <?php     
							if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
							
							echo  $_SESSION['username'];
						} else {
							echo "Please log in first to see this page.";
						}
						
						?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="utente.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!-- NAV BAR-->
    <nav class="navbar sticky-top" style="background-color: #641C34 ; " id="home">
			<a class="navbar-brand" href="../indexloggato.php">
                <img src="../immagini/logo_small.png" height="55px" alt="150px">
            </a>
			
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <ul>
				<li><a href="../indexloggato.php#home">Home</a></li>
				<li><a href="../indexloggato.php#logout">Logout</a></li>
				<li><a href="../indexloggato.php#domande">Faq</a></li>
                <li><a href="../indexloggato.php#domande">Contattaci</a></li>
			</ul>	
        </nav>

    <!-- PROFILO  -->
    <div class="row py-5 ">
        <div class="col-md-10 mx-auto">
            
            <div class="bg-white shadow rounded overflow-hidden">
                <!-- NOME   -->               
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="../img/sfondo.jpg" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                        <div class="media-body mb-5 text-white">
                            <h1 class="mt-0 mb-0"><?php     
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo $_SESSION['username'];
                                    } else {
                                        echo "Please log in first to see this page.";
                                    }
                                    ?></h1>
                            <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>Amico degli animali</p>
                        </div>
                    </div>
                </div>
                <!-- RATING  -->
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">
                            <?php
                                    $dbconn =pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password")
                                    or die('Could not connect: ' .pg_last_error());
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        $uname=$_SESSION['username'];
                                    }else {
                                        $uname= "Please log in first to see this page.";
                                    }
                                    $sql="select * from adozioni where username='$uname'";
                                    $result=pg_query($sql)or die('Query failed:'.pg_last_error());

                                    $num = pg_num_rows($result);

                                    echo $num;
                                ?>
                            </h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Animali adottati</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">2021</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Anno iscrizione</small>
                        </li>
                    </ul>
                </div>

                <?php
                    $dbconn =pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password")
                    or die('Could not connect: ' .pg_last_error());

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $uname=$_SESSION['username'];
                    }else {
                        $uname= "Please log in first to see this page.";
                    }
                    $sql="select nomem,specie from adozioni where username='$uname'";
                    $result = pg_query($sql)or die('Query failed:'.pg_last_error());
                    $num = pg_num_rows($result);
                    
                    $adottati = [];
                    for ($num-1;$num > 0;--$num){
                        array_push($adottati,pg_fetch_row($result));
                    }
                ?>
                <!-- TABELLA ANIMALI ADOTTATI  -->
                <?php if (count($adottati) > 0): ?>
                
                    <center><img src="img/logo_large.png" height="120" alt=""></center>
                    <br><br>
                    <center><h4><?php echo $_SESSION['username'];?> ! Ecco i tuoi MagicalPet! </h4></center>
                    <br>
                    <ul class="pagination justify-content-center">
                        <div class="row">
                        <?php foreach ($adottati as $row): array_map('htmlentities', $row); ?>
                            <?php if ($row[1] == 'poro'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/Fat_Poro.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Il tuo amico poro è fedele e affettuoso, pieno di gioia e di peli!!</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'felyne'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/felyne.webp" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'almiraj'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/Almiraj.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Questo tuo nuovo coniglietto cicciottello cornuto è sempre affamato di carote e di affetto.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'chocobo'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/chocobo.jpeg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Il suo becco è duro come un sasso ma le sue piume rendono il suo corpo mobido e soffice, ideale per un pisolino in campagna.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'snaso'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/snaso.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Attento al portafogli, e non solo al tuo, questa talpa dal musetto simpatico potrebbe farti finire nei guai.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'drago'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/cucciolodidrago.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Sembra un'angioletto quando dorme ma quando è sveglio porta caos e distruzione in giro per la stanza, meglio tenerlo all'aperto.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'occamy'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/occamy.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Essendo giustospazioso può entrare in una tua tasca ma stai attento al luogo in cui lo lasci, tende ad espandersi e occupare tutto lo spazio disponibile.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'pseudodrago'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/pseudodrago.webp" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text"> Incredibilmente curioso e utile quando si tratta di magia, ma non avicinarti alla sua ciotola di cibo, il suo pungiglione è molto velenoso.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'cerbero'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/cerbero.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">E adesso che fai?! gli dai un nome solo o chiami ogni testa in modo diverso?!</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'flerken'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/flerken.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Si struscia e fa le fusa, tal volta se lo accarezzi mentre guardi da un'alltra parte potresti sentire qualcosa di viscido,ma non preoccuparti sono i tentacoli.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'fenice'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/fenice.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Se muore non preoccuparti, non serve scaricarla nel gabinetto come hai fatto col pesce rosso, aspetta qualche giorno e dopo essere andata in autocombustione rinascerà come nuova.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'prinny'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/prinny.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Sembra essere stranamente terrorizzato da ogni tuo movimento...</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'chimera'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/chimera.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Forse non è stata una buona idea fondere insieme animali cosi' diversi tra di loro, non la smettono di bisticciare.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'gatto_alato'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/gatto_alato.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Dall'alto è più facile vedere i topi, e poi op l'ho sempre detto che i gatti assomigliano molto ai gufi.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'pegaso'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/pegaso.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Sembra di essere in una favola, no... mangia troppe carote per essere una favola.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'kitsune'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/kitsune2.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Occhio! Non sono i ladri! Potrebbe essere la tua kitsune nell'altra forma.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'grifone'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/grifon.png" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Ti scruta con sguardo attento, è piuttosto pericoloso, non fare movimenti bruschi.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>
                            <?php if ($row[1] == 'tartaruga'): ?>
                                <div class="col-sm-4">
                                        <div class="card-flex-container" style="width: 18rem;" >
                                                    <img class="card-img-top" src="img/tartaruga_3.jpg" alt="Card image cap" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                        <p class="card-text">Non è molto divertente, per la maggior parte del tempo sta ferma.</p>
                                                        <div class="dropdown">  <!-- aiuta col layout -->
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                            <?php endif; ?>


                        <?php endforeach; ?>
                        </div>
                    </ul>

                <?php endif; ?>
                <?php if (count($adottati) == 0): ?>
                    <h4 style="color:#641C34"><br>Non hai ancora adottato un animale :(</h4>
                <?php endif; ?>

                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="mb-0" style ="color:#641C34">Altri animali che puoi adottare!</h3><a href="../catalogo_animali/catalogo_loggato.html" class="btn btn-link text-muted">Vai al catalogo!</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"> <img class="card-img-top" src="img/tartaruga_3.jpg" alt="Card image cap" height="350"></div>
                        <div class="col-sm-4"><img class="card-img-top"src="../catalogo_animali/immagini/fenice.jpg" alt="Card image cap" height="350"></div>
                        <div class="col-sm-4"><img class="card-img-top"src="../catalogo_animali/immagini/pegaso.jpg" alt="Card image cap" height="350"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->

    <footer class="page-footer font-small white" id ="piede">
        <div class="footer-copyright text-center py-1"  style="background-color: #641C34 ;color:white">
        </div>
        <center>
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
        </div> </center>
        <div class="footer-copyright text-left py-3"  style="background-color: #641C34 ;color:white"><strong>&nbsp Si ringraziano i soci </strong> John e Giorgio   .
        </div>
</body>
</html>