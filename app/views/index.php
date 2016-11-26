<?php

if(!isset($_SESSION)){
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="bg-green">
        <div class="login-page">
          <section class="form">
            <form name="registerUser" action="../controllers/loginController.php" method="POST">
              <input type="text" name="email" placeholder="Email"/>
              <input type="password" name="password" placeholder="Senha"/>
              <input type="submit" class="btn-send" value="Logar">
              <p class="message">Esqueceu sua senha? Clique aqui!</p>
              <p class="error-text">
                  <?php
                      if(isset($_SESSION['message'])){
                          echo $_SESSION['message'];
                          $_SESSION['message'] = null;
                      }
                  ?>
              </p>
            </form>
          </section>
        </div>
    </div>
</body>
</html>
