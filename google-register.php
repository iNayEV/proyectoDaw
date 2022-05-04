<?php
    $prof_pic = $_REQUEST["prof-pic"];
    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $passwd = $_REQUEST["passwd"];
    $num = "";
    $descrip = "";

    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username = '".$username."'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows < 1) {
        $sql = "INSERT INTO users VALUES(null,'$email','$username','$passwd','$firstname','$lastname','$num','$descrip',0,0,'$prof_pic','light')";
        echo $sql;
        $result = mysqli_query($con, $sql);

        session_start();
                     
        $_SESSION["user"] = $username;
    
        header("Location: index.php");
    }