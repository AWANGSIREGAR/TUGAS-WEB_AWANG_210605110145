<?php
    $server ="localhost";
    $username ="root";
    $password ="";
    $database ="database_web";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn){
        die("Connection Failed:". mysqli_connect_error());
    }
?>