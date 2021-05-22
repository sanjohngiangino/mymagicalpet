<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
       <link rel="icon" href="../logo.ico">
        <title>MyMagicalPet - Adozione</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script type="text/javascript" lang="javascript" src="adozione.js"></script>
        <link rel="stylesheet" type="text/css" href="adozione.css">
    </head>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <body class="text-center">
        <nav class="navbar sticky-top" style="background-color: #641c34 ; " id="home">
			<a class="navbar-brand" href="../indexloggato.php">
                <img src="../immagini/logo_small.png" height="55px" alt="150px">
            </a>
			
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

			<ul>
				<li><a href="../indexloggato.php">Home</a></li>
				<li><a href="../indexloggato.php#logout">Logout</a></li>
				<li><a href="../indexloggato.php#domande">Faq</a></li>
			</ul>	
        </nav>

        <br>
        <center><img src="logo_large.png" height="120px" alt="150"  ></center>

      <br>
		<div class="media">
            <img class="mr-3" src="../img/poro3.jpg"  height="100px" >
            <div class="media-body"><br>
				<font color="white">
                	<h1><strong><?php     
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    
                                    echo $_SESSION['username'];
                                } else {
                                    echo "Please log in first to see this page.";
                                }
                                ?> , Compila per avere il tuo MagicalPet!</strong></h1>
                	<h4>Scegli la specie e il nome del tuo futuro animale del cuore.</h4>
				</font>
                <ul class="list-group list-group-flush" id ="poro">
                </ul>
            </div>
        </div>
        <br><br>
      <ul class="pagination justify-content-center">
      <form action="adozionedb.php" method="post">
        <form name="reg">
                <div class="form-row">
                    <div class="form-group  col-md-4">
                        <label >Nome Magical Pet</label>
                        <input type="text" class="form-control" id="inputNamem" placeholder="Nome del tuo magicalpet" name="nomem">
                    </div>
                    <div class="form-group col-md-4">
                    <label >Specie Magical Pet</label>
                    <select name="specie" class="form-control" id="inputSpecie" type="text">
                    <option value="poro">Poro</option>
                                <option value="felyne">Felyne</option>
                                <option value="almiraj">Almiraj</option> 
                                <option value="chocobo">Chocobo</option> 
                                <option value="snaso">Snaso</option> 
                                <option value="drago">Cucciolo di drago</option> 
                                <option value="occamy">Occamy</option> 
                                <option value="pseudodrago">Pseudodrago</option> 
                                <option value="cerbero">Cerbero</option> 
                                <option value="flerken">Flerken</option> 
                                <option value="fenice">Fenice</option> 
                                <option value="prinny">Prinny</option> 
                                <option value="chimera">Chimera</option> 
                                <option value="gatto_alato">Gatto alato</option> 
                                <option value="pegaso">Pegaso</option> 
                                <option value="tartaruga">Tartaruga bonsai</option> 
                                <option value="kitsune">Kitsune</option> 
                                <option value="grifone">Grifone</option>
                    </select>
                    </div>
                    <div class="form-group  col-md-4">
                        <label >Username Utente</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Username Utente" name="username">
                    </div>

                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Pianeta</label>
                      <input type="text" class="form-control" id="inputPianeta" placeholder="Inserisci qui il tuo Pianeta" name="pianeta">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Citta'</label>
                      <input type="text" class="form-control" id="inputCitta" placeholder="Inserisci qui il tuo Citta'" name="citta">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Indirizzo</label>
                        <input type="text" class="form-control" id="inputIndirizzo" placeholder="Inserisci qui il tuo Indirizzo" name="indirizzo">
                    </div>
                    
                </div>

                <br>
				<button type="submit" class="btn btn-primary" style="background-color: #641C34 ;color:white"> Invia Form di adozione </button>
		</form>
		</form>  
        </ul>
        <br><br>  

    <!-- Footer -->




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
      <!-- Fine Footer -->

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      

    </body>   
</html>