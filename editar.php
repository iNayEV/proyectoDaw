<!DOCTYPE html>
<html lang="en">
<head>
	<?php
        session_start();
        include("sql/connect.php");
        include("include/head.php");
    ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
		include("include/header.php"); 
		if(!isset($_SESSION["user"])) {
			header("location: index.php");
        }else{
            include("include/header2.php");
        } ?>
		</div>
        </div>
        </header>
        <?php 
            $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
            $result = mysqli_query($con, $sql);
            $reg = mysqli_fetch_array($result);
        ?>
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
            <form action="validate/user_mod.php" method="POST" class="form login secondary-dark" enctype="multipart/form-data">
                <div class="form__field">
                    <label for="firstname"><i class="fa-solid fa-user ico_"></i></label>
                    <input id="firstname" type="text" name="firstname" class="form__input" placeholder="Nombre" value="<?php echo $reg["firstname"] ?>" required>
                </div>
                <div class="form__field">
                    <label for="lastname"><i class="fa-solid fa-user ico_"></i></label>
                    <input id="lastname" type="text" name="lastname" class="form__input" placeholder="Apellido" value="<?php echo $reg["lastname"] ?>" required>
                </div>
                <div class="form__field">
                    <label for="img-inp"><i class="fa-solid fa-image ico_"></i></label>
                    <input type="file" name="prof-img" id="img-inp" class="inputfile" required>
                    <label for="img-inp" class="lbl">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <span>Elige archivo...</span>
                    </label>
                </div>
                <div class="form__field">
                    <label for="post-descrip">
						<i class="fa-solid fa-comment-dots ico_"></i>
                    </label>
					<textarea name="post-descrip" id="prof-descrip" class="descrip" placeholder="Descripción (opcional)"><?php echo $reg["prof_descrip"] ?></textarea>
                </div>
                <div class="form__field">
                    <label for="phone-number">
                        <i class="fa-solid fa-phone ico_"></i>
                    </label>
                    <input id="phone-number" type="text" name="phone-number" class="form__input" placeholder="Número de teléfono (opcional)" value="<?php echo $reg["num"] ?>">
                </div>
                <div class="form__field">
                    <input type="hidden" name="username" value="<?php echo $reg["username"] ?>">
                    <input class="btn-login" type="submit" name="submit" value="Publicar">
                </div>
            </form>
        </div>
    </div>
    <script src="js/filename.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="js/theme.js"></script>
</body>
</html>
