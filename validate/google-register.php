<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="../css/custom.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<?php
    include("../sql/connect.php");

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
    $username = mysqli_real_escape_string($con, $_REQUEST["username"]);
    $passwd = mysqli_real_escape_string($con, $_REQUEST["passwd"]);
    $hash = password_hash($passwd,PASSWORD_DEFAULT);
    $num = "";
    $descrip = "";

    $sql = "SELECT * FROM users WHERE username = '".$username."'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if (!$rows) {
        $sql = "INSERT INTO users VALUES(null,'$email','$username','$hash','$firstname','$lastname','$num','$descrip',0,0,'$prof_pic','light',0)";
        echo $sql;
        $result = mysqli_query($con, $sql);

        session_start();
                     
        $_SESSION["user"] = $username;
    
        header("Location: ../index.php");
    } else {
        ?>
            <header>
        <div class="header">
            <div class="header-wrap-login">
                <a href="../index.php"><img class="logo-img" src="../img/logo-example.png" alt=""></a>
            </div>
        </div>
    </header>
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
        <?php
            require_once ("../auth.php");
            $sql = "SELECT * FROM users WHERE email='".$email."'";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows > 0) {
                $reg = mysqli_fetch_array($result);
                session_start();
                            
                $_SESSION["user"] = $reg["username"];
            
                header("Location: ../index.php");
            } else {
                ?>
                    <form action="google-register.php" method="POST" enctype="multipart/form-data" class="form login">
                        <input type="hidden" name="prof-pic" value="<?php echo $_POST["prof-pic"] ?>">
                        <input type="hidden" name="firstname" value="<?php echo $_POST["firstname"] ?>">
                        <input type="hidden" name="lastname" value="<?php echo $_POST["lastname"] ?>">
                        <input type="hidden" name="email" value="<?php echo $_POST["email"] ?>">
                        <div class="text-center div-error" id="div-error"><span>Usuario existente</span></div>
                        <div class="text-center">
                            <img src="<?php echo $_POST["prof-pic"] ?>" class="border-radius">
                        </div>
                        <h3 class="text-center"><span><?php echo $_POST["firstname"]."</span> <span>".$_POST["lastname"]."</span>" ?></h3>
                        <span><p class="text-center"><?php echo $email ?></p></span>
                        <div id="form-reg-google"></div>
                    </form>
                <?php
            } ?>
        <?php
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#form-reg-google').load('../ajax/reg-google.php');
    });
</script>
<script>
    console.log("hola");
    setTimeout(() => {
        document.getElementById("div-error").style.display = "none";
    }, 3000);
</script>
</body>
</html>