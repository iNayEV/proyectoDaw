<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dbName = "liberty";

    // Create connection

    $con = mysqli_connect($serverName, $userName, $password, $dbName);

    if(mysqli_connect_errno()) {
        echo "Failed to connect!";
        exit();
    }
?>