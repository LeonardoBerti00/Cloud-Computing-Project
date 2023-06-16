<?php echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>"; ?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Primo avvio</title>
</head>

<body>
	
	<p class="centeredtext"><em>Configurazione dei database per il primo utilizzo...</em></p>
	<div class="loginbox">

			<?php
				error_reporting(E_ALL & E_NOTICE);
							
				//impostazione nome database
				$db_name="cloud";
				//impostazione nome tabella studenti nel database
				$users_table="users";
				//username
				$uName="cloudProj";
				//password
				$uPass="528de2dJMDRyHvH9";
				//indirizzo
				$addr="localhost";
				
				$dbConn=new mysqli($addr,$uName,$uPass);
				
				if(mysqli_connect_errno()){
					$connect_error=mysqli_connect_error();
					echo "<p class=\"centeredtext\" style=\"text-color:red\">ATTENZIONE: errore \"$connect_error\" nella connessione al database. L'operazione è stata terminata.</p>";
					exit();
				}

//creazione database------------------------------------------------------------------------------
				$dbCreateQuery="CREATE DATABASE if not exists $db_name";
				
				if($resultQ=mysqli_query($dbConn,$dbCreateQuery))
					echo "<p class=\"centeredtext\">Database \"$db_name\" creato </p>";
				else{
					echo "<p class=\"centeredtext\" style=\"text-color:red\">ATTENZIONE: errore nella creazione del database \"$db_name\". L'operazione è stata terminata.</p>";
					exit();
				}
				
				mysqli_close($dbConn);
				
				require 'dbConn.php';

//creazione della tabella studenti---------------------------------------------------------------
				$query="CREATE TABLE if not exists $users_table (";
				$query.="userId int NOT NULL auto_increment, primary key (userId), ";
				$query.="nome varchar (50) NOT NULL, ";
				$query.="cognome varchar (32) NOT NULL, ";
				$query.="password varchar (100) NOT NULL, ";
				$query.="matricola varchar (32) NOT NULL, ";
				$query.="mail varchar (100) NOT NULL";
				$query.=");";

				if($queryRes=mysqli_query($dbConn,$query))
					echo "<p class=\"centeredtext\">Tabella utenti \"$users_table\" creata </p>";
				else{
					echo "<p class=\"centeredtext\" style=\"text-color:red\">ATTENZIONE: errore nella creazione della tabella utenti \"$users_table\". L'operazione è stata terminata.</p>";
					exit();
				}

				mysqli_close($dbConn);
			?>

			<p class="centeredtext" style="text-color:green">CONFIGURAZIONE INIZIALE COMPLETATA CON SUCCESSO. Sistema pronto per il primo utilizzo. <a href="register.php">Vai al login</a></p>
		</div>
	</div>
</body>
