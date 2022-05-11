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
    <div class="align" style="width: 100%; height: 100%;">
        <div class="grid">
            <form action="validate/validate_post.php" method="POST" class="form login secondary-dark" enctype="multipart/form-data">
                <div class="form__field">
                    <label for="img-inp"><i class="fa-solid fa-image ico_"></i></label>
                    <input type="file" name="post-img" id="img-inp" class="inputfile" required>
                    <label for="img-inp" class="lbl">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <span>Elige archivo...</span>
                    </label>
                </div>
                <div class="form__field">
                    <label for="post-descrip">
						<i class="fa-solid fa-comment-dots ico_"></i>
                    </label>
					<textarea name="post-descrip" id="post-descrip" class="descrip" placeholder="Descripción (opcional)"></textarea>
                    <!-- <input id="phone-number" type="text" name="phone-number" class="form__input" placeholder="Descripción (opcional)"> -->
                </div>
                <div class="form__field">
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
