<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
</head>
<body>
    <center>
        <?php

        $conn = mysqli_connect("localhost", "cloudPtoj", "528de2dJMDRyHvH9", "cloud");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
         
        $password = $_REQUEST['password'];
        $matricola =  $_REQUEST['matricola'];
        $nome = $_REQUEST['nome'];
        $cognome =  $_REQUEST['cognome'];
        $mail = $_REQUEST['mail'];

        $enc_pwd = md5($password);
/*
//CHECK-----------------------------------------------------------------------------
        $dbmat=mysqli_query($conn, "SELECT * FROM users WHERE matricola='$matricola'");
        if($matricola == $dbmat){
            echo "matricola gia esistente";
        }
*/

//inserimento dati users------------------------------------------------------------------------ 

        $sql = "INSERT INTO users VALUES 
            ('','$nome', '$cognome','$enc_pwd','$matricola','$mail')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>dati inseriti correttamente</h3>"; 
  
            echo nl2br("\n$matricola\n $nome\n "
                . "$cognome\n $mail\n");
        } 
        else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
        <a href="home.php">vai alla home</a></p>
        
    </center>
</body>

<?php
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['cognome'] = $_POST['cognome'];
    $_SESSION['matricola'] = $_POST['matricola'];
?>

</html>