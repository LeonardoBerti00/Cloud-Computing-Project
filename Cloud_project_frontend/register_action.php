<?php
    session_start();

    if(isset($_POST['submit'])){
        // Fetching variables of the form
        $email = $_POST['email'];
        $matricola = $_POST['matricola'];
        $password = $_POST['password'];
        echo $password;
        
        if($email !='' && $matricola !='' && $password !='')
        {
         // send data....
        header("Location: dtml/login.php");
        }
    }
?>