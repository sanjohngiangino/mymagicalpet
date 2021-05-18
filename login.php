<!-- il login, per la natura del localhost, funziona solo sul pc dove risiede il server
il login funziona come registrazione.php-->
<?php

$dbconn =pg_connect("host=localhost port=5432 dbname=postgres user=mymagicalpets password=password")
or die('Could not connect: ' .pg_last_error());


$password=$_POST['password'];
$uname=$_POST['username'];

$sql="select * from iscritti where username='$uname' and password = '$password'";

	
$result=pg_query($sql)or die('Query failed:'.pg_last_error());
$num = pg_num_rows($result);

$_SESSION['loggedin']=false;
// controlla se esiste già un iscritto 
if($num == 1){
	session_start();
	header('location:indexloggato.html');
	$_SESSION['loggedin']=true;
	$_SESSION['username']= $uname;
}
else{
	session_destroy();
	$_SESSION['loggedin']=false;
	header('location:index.html');
}
?>