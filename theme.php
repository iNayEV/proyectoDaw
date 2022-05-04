<?php
    session_start();

    $username = $_SESSION["user"];
    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);
    $theme = $reg["mode"]=="light"?"dark":"light";

    $sql = "UPDATE users SET mode='$theme' WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    header("location:index.php");