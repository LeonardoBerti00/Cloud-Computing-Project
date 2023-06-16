<?php

//impostazione nome database
$db_name="educraft";
//impostazione nome tabella utenti nel database
$users_table="users";
//username
$uName="educraft";
//password
$uPass="528de2dJMDRyHvH9";
//indirizzo
$addr="localhost";

//apertura connessione al database
$dbConn=new mysqli($addr,$uName,$uPass,$db_name);

//gestione errori di connessione - se si verifica errore di connessione -> visualizza messaggio di errore informativo della causa
if(mysqli_connect_errno()){
	$connect_error=mysqli_connect_error();
	echo "<p class=\"loginwarning\">Errore \"$connect_error\" di connessione al database. Impossibile procedere.</p>";
}

?>
