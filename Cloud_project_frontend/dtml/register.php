<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registration page</title>
  <!--Font-->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <!--Main CSS-->
  <link rel="stylesheet" href="./style.css">

</head>
<body>
  <div class="login-form">

    <form action="../register_action.php" method="POST" enctype="multipart/form-data">
      <h1>Register</h1>
      <div class="content">
        <div class="input-field">
          <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-field">
          <input type="text" placeholder="Matricola" name="matricola" required>
        </div>
        <div class="input-field">
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <a href="login.php" class="link">Already have an account? Log in</a>
      </div>
      <div class="action">
        <button type="submit">Register</button>
      </div>
    </form>

  </div>
  <script src="./script.js"></script>

</body>
</html>