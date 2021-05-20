<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>MyMagicalPet - Pagina Utente</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="utente.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar sticky-top" style="background-color: #641C34 ; " id="home">
			<a class="navbar-brand" href="../indexloggato.html">
                <img src="../immagini/logo_small.png" height="55px" alt="150px">
            </a>
			
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
 
<div class="row py-5 ">
    <div class="col-md-10 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">

            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="../img/sfondo.jpg" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                    <div class="media-body mb-5 text-white">
                        <h2 class="mt-0 mb-0"><?php     
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                echo $_SESSION['username'];
                                } else {
                                    echo "Please log in first to see this page.";
                                }
                                ?></h2>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>Amico degli animali</p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">
                        <?php
                                $dbconn =pg_connect("host=localhost port=5432 dbname=postgres user=mymagicalpets password=password")
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
                $dbconn =pg_connect("host=localhost port=5432 dbname=postgres user=mymagicalpets password=password")
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
                                                <img class="card-img-top" src="img/Almiraj.png" alt="Card image cap" height="200px">
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong><?php echo $row[0]?></strong></h5>
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                                                    <p class="card-text">Preparati a nuove avventure e a lunghe conversazioni con il tuo nuovo amico felino!</p>
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
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="../catalogo_animali/immagini/sfondo.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="../catalogo_animali/immagini/fenice.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="../catalogo_animali/immagini/pegaso.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pl-lg-1"><img src="../catalogo_animali/immagini/occamy.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>