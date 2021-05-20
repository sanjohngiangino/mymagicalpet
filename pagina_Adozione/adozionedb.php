<html>
<title>Adozione</title>
<head></head>
<body>
    <?php
	
        $dbconn =pg_connect("host=localhost port=5432 
            dbname=postgres
             user=mymagicalpets password=password")
        or die('Could not connect: ' .pg_last_error());

// variabili di tipo post che prendono in input i dati dalla form registrazione.html


$nomem=$_POST['nomem'];
$specie=$_POST['specie'];
$uname=$_POST['username'];

	$reg= "insert into adozioni(nomem,specie,username) values ('$nomem', '$specie','$uname') ";
	pg_query($dbconn, $reg);
	echo"Adozione registrata nel database";
	header('location:formoprofilo.html');

//chiusura
        pg_free_result($result);
        pg_close($dbconn);
        ?>
    </body>
</html>