<?php
    require_once ("auth.php");
   
    include("sql/connect.php");
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
            <div>
                <form action="google-register.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="prof-pic" value="<?php echo $picture ?>">
                    <input type="hidden" name="firstname" value="<?php echo $givenName ?>">
                    <input type="hidden" name="lastname" value="<?php echo $familyName ?>">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <img src="<?php echo $picture ?>" alt="">
                    <h3><span><?php echo $givenName."</span> <span>".$familyName."</span>" ?></h3>
                    <span><p><?php echo $email ?></p></span>
                    <label for="username">Inserta nombre de usuario</label>
                    <input type="text" name="username"><br>
                    <label for="passwd">Inserta contraseña</label>
                    <input type="password" name="passwd"><br>
                    <input type="submit">
                </form>
            </div>
        <?php
    }