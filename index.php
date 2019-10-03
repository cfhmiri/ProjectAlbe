<?php

include 'createDB.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $myusername = mysqli_real_escape_string($db,$_GET["username"]);
    
    
    $sql = "SELECT id FROM admin WHERE username = '$myusername'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
}
    

     if ($conn->query($sql) === TRUE) {
         echo "Table Colori created successfully";
     } else {
         echo "Error creating table: " . $conn->error;
     }



    $conn->close();

    $colori = array(
        'colore1' => "ROSSO",
        'colore2' => "VERDE",
        'colore3' => "BLU",
        'colore4' => "MARRONE",
    );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
            <?php foreach($colori as $i => $value){
                ?> <ul><?php echo $value;?> <a href="https://www.google.it/">LINK<a><ul> <?php
            } ?>

        <form method="GET" action="modif.php">
            <h1>LOGIN</h1>
            <input type="text" name="username">
            <input type="submit" name="invia">
            
        </form>
            
    </body>
</html>