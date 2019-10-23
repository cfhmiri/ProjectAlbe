<?php
require "controllerAlbe.php";

$loginError = false;

if (isset($_POST['username']) || isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $loginResult = tryLogin($username, $password);

  if ($loginResult) {
    setcookie("user", $username);

    header('Location: index.php');
    exit;
  }

  $loginError = true;
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8"> <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ProjectAlbe | Login?></title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/stile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
  <div class="content login flex-cont-col">
    <div class="flex-cont-col max-width v-center h-center flex-1">
      <div class="login-cont">
        <h1>ProjectAlbe</h1>
        <?php if ($loginError) { ?>
          <p class="error">Credenziali non valide</p>
        <?php }?>
        <form action="" method="POST">
          <div>
            <label for="username">Username</label>
            <input id="username" type="text" name="username">
          </div>
          <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
          </div>
          <div>
            <input type="submit" value="Accedi">
          </div>
          <a href="index.php">Torna indietro</a>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
