<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login page</title>
  <!--Font-->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <!--Main CSS-->
  <link rel="stylesheet" href="./style.css">

</head>
<body>
  <div class="login-form">

    <form action="../login_action.php" method="POST" enctype="multipart/form-data">
      <h1>Login</h1>
      <div class="content">
        <div class="input-field">
          <input type="email" placeholder="Email" name="email" autocomplete="nope" required>
        </div>
        <div class="input-field">
          <input type="text" placeholder="Matricola" name="matricola" autocomplete="nope" required>
        </div>
        <div class="input-field">
          <input type="password" placeholder="Password" name="password" autocomplete="new-password" required>
        </div>
      <a href="register.php" class="link">Don't have an account? Sign up</a>
      </div>
      <div class="action">
       <!-- <a href="register.php" class="link"></a><button>Register</button></a> -->
        <button type="submit">Sign in</button>
      </div>
    </form>

  </div>
  <script  src="./script.js"></script>
</body>
</html>