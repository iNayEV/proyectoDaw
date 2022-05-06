<?php
    $prof_pic = $_REQUEST["prof-pic"];
    $firstname = $_REQUEST["firstname"];
    $lastname_arr = str_split($_REQUEST["lastname"]);
    for ($i = 0; $i < count($lastname_arr); $i++) {
        if ($lastname_arr[$i] != " ") {
            $lastname[$i] = $lastname_arr[$i];
        } else {
            break;
        }
    }
    $lastname = implode($lastname);
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $passwd = $_REQUEST["passwd"];
    $hash = password_hash($passwd,PASSWORD_DEFAULT);
    $num = "";
    $descrip = "";

    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username = '".$username."'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows < 1) {
        $sql = "INSERT INTO users VALUES(null,'$email','$username','$hash','$firstname','$lastname','$num','$descrip',0,0,'$prof_pic','light')";
        echo $sql;
        $result = mysqli_query($con, $sql);

        session_start();
                     
        $_SESSION["user"] = $username;
    
        header("Location: index.php");
    }