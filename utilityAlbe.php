<?php

// Creazione Database 
$sqlCreateDatabase = "CREATE DATABASE $dbName";

if (mysqli_query($conn, $sqlCreateDatabase)) {
    echo "Database $dbName creato <br>";
  } else {
    $errorCode = mysqli_errno($conn);


?>