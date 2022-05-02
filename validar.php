<?php

    // Get username and password send by method POST
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];

    // Start session
    session_start();

    $_SESSION["user"] = $username;

    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username = '$username' and passwd = '$passwd'";
    $result = mysqli_query($con,$sql);

    $rows = mysqli_num_rows($result);

    if($rows) {
        header("location:index.php");
    } else {
        header("location:login.php?error=1");
        ?>
        <!-- <h1 class="auth">ERROR EN LA AUTENTIFICACIÓN</h1> -->
        <?php
    }

    mysqli_free_result($result);
    mysqli_close($con);
?>