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
    <header>
        <div class="header">
            <div class="header-wrap-login">
                <a href="index.html"><img class="logo-img" src="img/logo-example.png" alt=""></a>
            </div>
        </div>
    </header>
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
            <form action="validate/validate_register.php" method="POST" class="form login" enctype="multipart/form-data">
                <div class="form__field">
                    <label for="firstname"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg></label>
                    <input id="firstname" type="text" name="firstname" class="form__input" placeholder="Nombre" required>
                </div>
                <div class="form__field">
                    <label for="lastname"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg></label>
                    <input id="lastname" type="text" name="lastname" class="form__input" placeholder="Apellido" required>
                </div>
                <div class="form__field">
                    <label for="username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg></label>
                    <input id="username" type="text" name="username" class="form__input" placeholder="Nombre de usuario" required>
                </div>
                <div id="error-user" class="text--center bg-red hidden">
                    <span>USUARIO YA EXISTENTE</span>
                </div>
                <div class="form__field">
                    <label for="email"><span class="ico_">@</span></label>
                    <input id="email" type="email" name="email" class="form__input" placeholder="Correo electronico" required>
                </div>
                <div id="error-email" class="text--center bg-red hidden">
                    <span>CORREO YA EXISTENTE</span>
                </div>
                <div class="form__field">
                    <label for="password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg></label>
                    <input id="password" type="password" name="passwd" class="form__input" placeholder="Contraseña" required>
                </div>
                <div class="form__field">
                    <label for="img-inp"><i class="fa-solid fa-image ico_"></i></label>
                    <input type="file" name="post-img" id="img-inp" class="inputfile">
                    <label for="img-inp" class="lbl">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <span>Elige archivo... (opcional)</span>
                    </label>
                </div>
                <div class="form__field">
                    <label for="phone-number">
                        <i class="fa-solid fa-phone ico_"></i>
                    </label>
                    <input id="phone-number" type="text" name="phone-number" class="form__input" placeholder="Número de teléfono (opcional)">
                </div>
                <div class="form__field">
                    <input type="submit" name="submit" value="Registrarse">
                </div>
            </form>
            <p class="text--center">¿Tienes cuenta? <a href="login.php">¡Inicia sesión!</a></p>
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
    <script src="js/filename.js"></script>
    <?php
        if($_REQUEST["error"] == "username") {
            ?>
            <script>
                var element = document.getElementById("error-user");
                element.classList.remove("hidden");

                setTimeout(function(){ 
                    element.classList.add("hidden"); 
                }, 5000);
            </script>
            <?php
        }else if($_REQUEST["error"] == "email") {
            ?>
            <script>
                var element = document.getElementById("error-email");
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
