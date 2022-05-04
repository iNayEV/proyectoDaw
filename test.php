<?php
    require_once ("auth.php");
   
    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE email='".$email."'";
    echo $sql;
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {

    } else {
        echo "hola";
    }