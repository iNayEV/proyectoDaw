<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("sql/connect.php");
        include("include/head.php");
    ?>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include("include/header.php");
        if(!isset($_SESSION["user"])) {
            ?>
                <a href="login.php?page=user&username=<?php echo $_REQUEST["username"] ?>" class="c-pointer" style="margin-right: 1.25rem;"><button class="btn2 btn-login">Iniciar sesión</button></a>
                <?php
        }else{
            include("include/header2.php");
        } ?>
        </div>
        </div>
        </header>

    <div class="container mt-custom">
        <div class="row">
            <?php
                include("include/feed-left.php");
            ?>
            <div class="col-sm-8 theme-dark p-custom full-height">
                <div class="posts-list padding-20">
                    <?php
                        $sql = "SELECT * FROM users WHERE username='".$_REQUEST["username"]."'";
                        $result = mysqli_query($con, $sql);
                        $reg = mysqli_fetch_array($result);
                        $rows = mysqli_num_rows($result);
                        if ($rows > 0) {
                            if ($_REQUEST["username"] == $_SESSION["user"]) {
                                ?>
                                    <a href="editar.php?username=<?php echo $_REQUEST["username"] ?>" class="top-right btn-edit"><i class="fas fa-pen-to-square"></i></a>
                                <?php
                            } ?>
                                <img src="<?php echo $reg["prof_img"] ?>" class="prof-pic user-pic">
                                <h3><?php echo $reg["firstname"]." ".$reg["lastname"] ?></h3>
                                <span>@<?php echo $reg["username"] ?></span>
                                <div class="mt-1">
                                    <span class="desc"><?php echo $reg["prof_descrip"] ?></span>
                                </div>
                                <div class="mt-2 mb-2 ajax-follow">
                                    <div class="button-follow">
                                        <span><i class="fa-solid fa-users"></i><?php echo $reg["followers"] ?></span>
                                        <?php 
                                        if ($_SESSION["user"] != $_REQUEST["username"]) {
                                            if (isset($_SESSION["user"])) {
                                                $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
                                                $result = mysqli_query($con, $sql);
                                                $user = mysqli_fetch_array($result);
                                                $sql = "SELECT * FROM follows WHERE id_poster='".$reg["id_user"]."' AND id_user='".$user["id_user"]."'";
                                                $result = mysqli_query($con, $sql);
                                                
                                                $rows = mysqli_num_rows($result);
                                                
                                                if($rows < 1) {
                                                    ?>
                                                        <button class="btn2 btn-outline-blue follow marginb-2" id="<?php echo $reg["id_user"] ?>">
                                                            Seguir
                                                        </button>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <button class="btn2 btn-outline-red unfollow marginb-2" id="<?php echo $reg["id_user"] ?>">
                                                            Dejar de seguir
                                                        </button>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <button class="btn2 btn-outline-blue follow-noAcc">
                                                        Seguir
                                                    </button>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $sql = "SELECT * FROM posts WHERE id_user=".$reg["id_user"];
                                $result = mysqli_query($con, $sql);
                                $rows = mysqli_num_rows($result);

                                if ($_SESSION["user"] == $_REQUEST["username"]) {
                                    ?>
                                    <div class="div-content">
                                        <div class="remove-content">
                                        <div class="div-ul">
                                            <ul class="d-flex space-between">
                                                <li class="line" id="photos" onclick="moveLineLeft()">
                                                    Mis fotos
                                                </li>
                                                <li id="likes" onclick="moveLineRight()">
                                                    Likes
                                                </li>
                                            </ul>
                                        </div>
                                         
                                                    <?php
                                                        if($rows > 0) {?>
                                                            <div class="posts-list-content"><?php
                                                            while ($reg = mysqli_fetch_array($result)) {
                                                                ?>
                                                                        <img class="post" src="uploads/<?php echo $reg["post_img"] ?>">
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="posts-list-content d-flex-center">
                                                                <div id="post" class="div-center">
                                                                    Aún no has realizado ninguna publicación
                                                                </div>
                                                            <?php
                                                        } 
                                                    ?>
                                                </div>
                                            </div>
                                    <?php
                                } else {

                                    if($rows > 0) {?>
                                        <div class="posts-list-content"> <?php
                                        while ($reg = mysqli_fetch_array($result)) {
                                            ?>
                                                <img class="post" src="uploads/<?php echo $reg["post_img"] ?>">
                                            <?php
                                        }
                                    } elseif ($_SESSION["user"] != $_REQUEST["username"]) {
                                        ?>
                                        <div class="posts-list-content d-flex-center"> 
                                            <div id="post" class="div-center">
                                                Este usuario no tiene publicaciones
                                            </div>
                                        <?php
                                    }
                                }

                            ?> </div> <?php
                        } else {
                            echo "usuario inexistente";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("include/modal-logout1.php") ?>
    <form action="logout.php?page=user&username=<?php echo $_REQUEST["username"] ?>" method="POST">
    <?php include("include/modal-logout2.php") ?>

    <?php include("include/modal-login1.php") ?>
    <a href="login.php?page=user&username=<?php echo $_REQUEST["username"] ?>" class="text-dec-none">
    <?php include("include/modal-login2.php") ?>

    <?php include("include/button.php") ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/follow.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/button.js"></script>
    <script src="js/show_likes.js"></script>
    <script src="js/show_photos.js"></script>
    <script src="js/show_more.js"></script>
    <script>
        function moveLineRight() {
            var likes = document.getElementById("likes");
            var photos = document.getElementById("photos");
            likes.classList.add("line2");
            photos.classList.remove("line");
            photos.classList.remove("line3");
        }

        function moveLineLeft() {
            var likes = document.getElementById("likes");
            var photos = document.getElementById("photos");
            likes.classList.remove("line2");
            photos.classList.add("line3");
        }
    </script>
</body>
</html>