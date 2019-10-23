<?php
require "controllerAlbe.php";
//require "mockAlbe.php";

$colori = getAllColors();

$userLoggedIn = getLoggedInUser();

if ($userLoggedIn != null) {
  $colori[] = [
    "code" => "#ffffff",
    "name" => "Aggiungi colore",
    "is_add" => true,
  ];
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>ProjectAlbe</title>
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
    <strong>mettere classi corrette, modificare classi in aggiungiAlbe.php e dettaglio.php</strong>
    <div class="container">
        
      <?php if ($userLoggedIn == null) { ?>
        <div class="col-lg-2 user">
                <i class="fas fa-user"></i>
                <a href="loginAlbe.php">Login</a>
        </div>
      <?php } else { ?>
      <div>
        <i class="fas fa-user"></i>
        Ciao, <span class="tx-bold"><?=$userLoggedIn?></span>
      </div>
        <div class="col-lg-2 user">
                <i class="fas fa-user"></i>
                <a href="logoutAlbe.php">Logout</a>
        </div>
      <?php } ?>

    </div>

<!-- da mettere apposto con classi corrette -->
  <div class="content flex-cont-row">
      <?php if (count($colori) > 0) { ?>
        <div class="colors-container max-width flex-1">
          <?php foreach ($colori as $color) { ?>
            <div
              class="color">
              <div
                class="color-bg"
                style="background-color: <?=$color['code']?>">
                <div class="color-cont">
                  <span>
                    <?php if (isset($color['is_add'])) { ?>
                    <a
                      href="aggiungi_colore.php"
                      style="color: #888">
                      Aggiungi Colore
                    </a>
                    <?php } else { ?>
                    <a
                      href="dettaglio.php?id=<?=$color['id']?>"
                      style="color: <?=$color['code']?>">
                      <?=$color['name']?>
                    </a>
                    <?php } ?>
                  </span>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <div class="no-colors-cont tx-center flex-1 v-center flex-cont-col">
          <h3>Nessun colore da mostrare</h3>
        </div>
      <?php } ?>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
  
</body>
</html>
