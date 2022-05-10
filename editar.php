<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("sql/connect.php");
        include("include/head.php"); 
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
        <?php include("include/header.php");
        $username = $_GET["username"];
        if(!isset($_SESSION["user"]) || $username != $_SESSION["user"]) {
                header("location: user.php?username=$username");
        }else{
            include("include/header2.php");
        } ?>
        </div>
        </div>
        </header>

        <?php
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($con, $sql);
            $reg = mysqli_fetch_array($result);
        ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card secondary-dark">
                        <div class="card-header primary-dark">
                            Editar datos:
                        </div>
                        <form class="p-4" method="POST" action="editar-user/editarProceso.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nombre: </label>
                                <input type="text" class="form-control" name="firstname" required 
                                value="<?php echo $reg["firstname"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido: </label>
                                <input type="text" class="form-control" name="lastname" autofocus
                                value="<?php echo $reg["lastname"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email: </label>
                                <?php $email = preg_replace('/(?:^|.@).\K|.\.[^@]*$(*SKIP)(*F)|.(?=.*?\.)/', '*', $reg['email']); ?>
                                <input type="text" class="form-control" name="email" autofocus
                                value="<?php echo $reg["email"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Número (opcional): </label>
                                <input type="text" class="form-control" name="num" autofocus
                                value="<?php echo $reg["num"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción (opcional): </label>
                                <textarea name="descrip" id="descrip" class="form-control"><?php echo $reg["descrip"] ?></textarea>
                            </div>
                            <div class="form__field mb-3">
                                <label for="img-inp"><i class="fa-solid fa-image ico_"></i></label>
                                <input type="file" name="prof-img" id="img-inp" class="inputfile">
                                <label for="img-inp" class="lbl">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    <span>
                                        <?php
                                            if ($reg["prof_img"] != "") {
                                                ?>
                                                    Cambiar imagen de perfil (opcional)
                                                <?php
                                            } else {
                                                ?>
                                                    Elige archivo... (opcional)
                                                <?php
                                            }
                                        ?>
                                    </span>
                                </label>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="username" value="<?php echo $reg["username"] ?>">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>