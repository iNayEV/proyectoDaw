<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php 

        include("sql/connect.php");
        $sql = "SELECT * FROM users WHERE email = '".$email."'";
        $result = mysqli_query($con, $sql);
        $reg = mysqli_fetch_array($result);
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            session_start();
                                
            $_SESSION["user"] = $reg["username"];
        
            header("Location: index.php");
        }

    ?>
    <header>
        <div class="header">
            <div class="header-wrap-login">
                <a href="index.php"><img class="logo-img" src="img/logo-example.png" alt=""></a>
            </div>
        </div>
    </header>
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
        <?php
            require_once ("auth.php");
            $sql = "SELECT * FROM users WHERE email='".$email."'";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows > 0) {
                $reg = mysqli_fetch_array($result);
                session_start();
                            
                $_SESSION["user"] = $reg["username"];
            
                header("Location: index.php");
            } else {
                ?>
                    <form action="validate/google-register.php" method="POST" enctype="multipart/form-data" class="form login">
                        <input type="hidden" name="prof-pic" value="<?php echo $picture ?>">
                        <input type="hidden" name="firstname" value="<?php echo $givenName ?>">
                        <input type="hidden" name="lastname" value="<?php echo $familyName ?>">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <div class="text-center">
                            <img src="<?php echo $picture ?>" class="border-radius">
                        </div>
                        <h3 class="text-center"><span><?php echo $givenName."</span> <span>".$familyName."</span>" ?></h3>
                        <span><p class="text-center"><?php echo $email ?></p></span>
                        <div id="form-reg-google"></div>
                    </form>
                <?php
            } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#form-reg-google').load('ajax/reg-google.php');
        });
    </script>
</body>
</html>