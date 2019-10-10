<?php

  function getDBConnection()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    return $conn;
  }
  
  function createDB()
  {
    $conn = getDBConnection();
    // Create database ProjectAlbe
    $sql = "CREATE DATABASE ProjectAlbe";
    if (mysqli_query($conn, $sql)) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
  }

  function connectDB()
  {
    // TODO: Spostare queste informazioni
    // in un file ENV
    $dbName = "ProjectAlbe";

    $conn = getDBConnection();

    mysqli_select_db($conn, $dbName);

    return $conn;
  }

  function createTable($conn, $tableName, $tableSql)
  {
    if (mysqli_query($conn, $tableSql)) {
      echo "Tabella $tableName creata con successo <br>";
    } else {
      $errorCode = mysqli_errno($conn);

      switch ($errorCode) {
        case 1050:
          echo "Tabella $tableName già esistente, proseguo <br>";
          break;

        default:
          die("Errore creazione tabella $tableName: "
            . $errorCode . ": "
            . mysqli_error($conn));
      }
    }
  }

  function createUser($conn, $username, $password)
  {
    echo "Creo utente $username <br>";

    $sqlCreateUser = "
      INSERT INTO utenti
      (username, password)
      VALUES
      ('$username', '$password')
    ";

    $result = mysqli_query($conn, $sqlCreateUser);

    if ($result) {
      echo "Utente $username inserito con successo <br>";
    } else {
      die("Errore nell'inserimento di $username: "
        . mysqli_errno($conn) . ": "
        . mysqli_error($conn) . "<br>");
    }
  }
