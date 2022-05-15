<?php

    include("../sql/connect.php");

    // Get username and password send by method POST
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $passwd = mysqli_real_escape_string($con, $_POST["passwd"]);

    // Start session
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
    $reg = mysqli_fetch_array($result);
    
    $rows = mysqli_num_rows($result);
    
    if($rows > 0) {
        if(password_verify($passwd, $reg["passwd"])) {
            session_start();
        
            $_SESSION["user"] = $username;

            if(isset($_POST["user"])) {
                header("location: ../".$_POST["page"].".php?username=".$_POST["user"]);
            }else {
                header("location: ../".$_POST["page"].".php");
            } 

        } else {
            if(isset($_POST["user"])) {
                header("location: ../login.php?page=".$_POST["page"]."&username=".$_POST["user"]."&error=1");
            }else {
                header("location: ../login.php?page=".$_POST["page"]."&error=1");
            }
        }
    } else {
        if(isset($_POST["user"])) {
            header("location: ../login.php?page=".$_POST["page"]."&username=".$_POST["user"]."&error=1");
        }else {
            header("location: ../login.php?page=".$_POST["page"]."&error=1");
        }
    }
    
    mysqli_free_result($result);
    mysqli_close($con);
?>