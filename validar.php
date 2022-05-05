<?php

    // Get username and password send by method POST
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];

    // Start session
    
    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
    $reg = mysqli_fetch_array($result);
    
    $rows = mysqli_num_rows($result);
    
    if($rows) {
        if(password_verify($passwd, $reg["passwd"])) {
            session_start();
        
            $_SESSION["user"] = $username;
    
            header("location:index.php");
        } else {
            header("location:login.php?error=1");
        }
    }
    
    mysqli_free_result($result);
    mysqli_close($con);
?>