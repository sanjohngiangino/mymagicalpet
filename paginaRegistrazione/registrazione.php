<html>
<title>registrazione</title>
<head></head>
<body>
    <?php
	
        $dbconn =pg_connect("host=localhost port=5432 
            dbname=postgres
             user=postgres password=password")
        or die('Could not connect: ' .pg_last_error());

// variabili di tipo post che prendono in input i dati dalla form registrazione.html

$email=$_POST['email'];
$password=$_POST['password'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$uname=$_POST['username'];

$sql="select * from iscritti where username='$uname'";  // fa il check con username ( chiave primaria della tabella ) all'interno del database 
$result=pg_query($sql)or die('Query failed:'.pg_last_error());


$num = pg_num_rows($result);

// controlla se l'utente esiste già nel database 

if($num == 1){   // se esiste una riga 

	echo "L'utente esiste già!";
	header('location:reg_fallita.html');  // reinderizzato nella pagina reg fallita
	
}
else{  // altrimenti lo inserisce nella tabella iscritti tramite la insert
	$reg= "insert into iscritti(email,password,nome,cognome,username) values ('$email', '$password','$nome','$cognome','$uname') ";
	pg_query($dbconn, $reg);
	echo"Registrazione effettuata.";
	header('location:reg_successo.html');
	
}
//chiusura
        pg_free_result($result);
        pg_close($dbconn);
        ?>
    </body>
</html>