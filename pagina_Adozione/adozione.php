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

    <body class="text-center" onload="return stampaTabellaDaStorage();">
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

        <br><br><br>
        <div class="media">
            <img class="mr-3" src="../img/porocash.jpeg"  height="100px ">
            <div class="media-body"><br>
				<font color="white">
                	<h1><strong><?php     
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo $_SESSION['username'];
                                    } 
                                    else {
                                        echo "Please log in first to see this page.";
                                    }
                                ?> , Aiutaci con una Donazione!
                        </strong>
                    </h1>
                    <h4>La donazione copre tutte le spese mediche e di spedizione del tuo MagicalPet :D</h4>
				</font>
                <ul class="list-group list-group-flush" id ="poro">
                </ul>
            </div>
        </div>
        <br> <br>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
                    <div class="container" id="tabella">
                    </div>
                </div>
            </div>
        </div>
    
        <div id="vistaStorage"></div>
      
        <br><br><br><br><br>  
        <br><br><br>  
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
            </div> 
        </center>
        <div class="footer-copyright text-left py-3"  style="background-color: #641C34 ;color:white"><strong>&nbsp Si ringraziano i soci </strong> John e Giorgio   .
        </div>
        <!-- Fine Footer -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>   
</html>