<?php
    session_start();

    if(isset($_POST["logout"])) {
        session_destroy();
        unset($_SESSION["user"]);
        header("location:".$_REQUEST["page"].".php?username=".$_REQUEST["username"]);
    }
?>