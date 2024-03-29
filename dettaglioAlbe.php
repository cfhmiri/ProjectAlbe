<?php
require "controllerAlbe.php";

$userLoggedIn = getLoggedInUser();

$colorId = $_GET['id'];

/*
$color = [
  "name" => "Rosso",
  "code" => "#ff0000",
  "r" => 255,
  "g" => 0,
  "b" => 0,
];
 */

$color = getColorFromId($colorId);

$redPercentage = ($color['red'] / 255.0) * 100;
$greenPercentage = ($color['green'] / 255.0) * 100;
$bluePercentage = ($color['blue'] / 255.0) * 100;

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ProjectAlbe | Dettaglio Colore <?=$color['name']?></title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/stile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
  <div class="header">
    <h1>
      <a href="index.php">
          ProjectAlbe
      </a>
    </h1>
    <div class="login">
      <?php if ($userLoggedIn == null) { ?>
      <span>
        <i class="fas fa-user"></i>
        <a href="loginAlbe.php">Login</a>
      </span>
      <?php } else { ?>
      <div>
        <i class="fas fa-user"></i>
        Ciao, <span class="tx-bold"><?=$userLoggedIn?></span>
      </div>
      <a href="logoutAlbe.php">Logout</a>
      <?php } ?>
    </div>
  </div>
  <div class="content">
    <div class="flex-cont-col max-width">
      <div class="color-info flex-cont-row h-center">
        <div
          style="background-color: <?=$color['code']?>"
          class="color-thumbnail">
        </div>
        <div class="color-data flex-cont-col v-center">
          <div
            class="color-name">
            <?=$color['name']?>
          </div>
          <div
            class="color-code">
            <?=$color['code']?>
          </div>
        </div>
      </div>
      <div class="color-stats flex-cont-row">
        <div class="color-component red">
          <div class="color-slider">
            <div
              style="width: <?=$redPercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
        <div class="color-component green">
          <div class="color-slider">
            <div
              style="width: <?=$greenPercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
        <div class="color-component blue">
          <div class="color-slider">
            <div
              style="width: <?=$bluePercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>