<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/custom.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <div class="header">
            <div class="header-wrap-login">
                <a href="index.php"><img class="logo-img" src="img/logo-example.png" alt=""></a>
            </div>
        </div>
    </header>
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
            <form action="validate/validate_login.php" method="POST" class="form login">
                <?php 
                    if (isset($_REQUEST["username"])) {
                        ?>
                            <input type="hidden" name="user" value="<?php echo $_REQUEST["username"] ?>">
                        <?php
                    }
                ?>
                <input type="hidden" name="page" value="<?php echo $_REQUEST["page"] ?>">
                <div class="form__field">
                    <label for="login__username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg></label>
                    <input id="login__username" type="text" name="username" class="form__input" placeholder="Nombre de usuario" required>
                </div>
                <div class="form__field">
                    <label for="login__password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg></label>
                    <input id="login__password" type="password" name="passwd" class="form__input" placeholder="Contraseña" required>
                </div>
                <div id="error" class="text--center bg-red hidden">
                    <span>ERROR EN LA AUTENTIFICACIÓN</span>
                </div>
                <div class="form__field">
                    <input type="submit" value="Iniciar sesión">
                </div>
            </form>
            <p class="text--center">¿No tienes cuenta todavía? <a href="register.php">¡Regístrate!</a></p>
            <hr>
            <div>
                <?php require ("auth.php") ?>
                <a href="<?php echo $client->createAuthUrl() ?>" class="text-dec-none google-text">
                    <div class="google-div">
                        <span class="d-flex"><img src="uploads/google.png" width="25px" alt="">Continuar con Google</span>
                    </div>
                </a>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="icons">
            <symbol id="lock" viewBox="0 0 1792 1792">
                <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
            </symbol>
            <symbol id="user" viewBox="0 0 1792 1792">
                <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
            </symbol>
        </svg>
    </div>
    <?php
        if($_REQUEST["error"] == 1) {
            ?>
            <script>
                var element = document.getElementById("error");
                element.classList.remove("hidden");

                setTimeout(function(){ 
                    element.classList.add("hidden"); 
                }, 5000);
            </script>
            <?php
        }
    ?>
</body>
</html>
