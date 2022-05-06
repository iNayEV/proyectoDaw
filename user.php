<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("sql/connect.php");
        include("include/head.php");
    ?>
    <link rel="stylesheet" href="css/user.css">
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
                <div class="mb-5 posts-list padding-20">
                    <?php
                        $sql = "SELECT * FROM users WHERE username='".$_REQUEST["username"]."'";
                        $result = mysqli_query($con, $sql);
                        $reg = mysqli_fetch_array($result);
                        $rows = mysqli_num_rows($result);
                        if ($rows > 0) {
                            ?>
                                <img src="<?php echo $reg["prof_img"] ?>" class="user-pic">
                                <h3><?php echo $reg["firstname"]." ".$reg["lastname"] ?></h3>
                                <span>@<?php echo $reg["username"] ?></span>
                                <p class="desc"><?php echo $reg["prof_descrip"] ?></p>
                                <?php 
                                if (isset($_SESSION["user"])) {
                                    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
                                    $result = mysqli_query($con, $sql);
                                    $user = mysqli_fetch_array($result);
                                    $sql = "SELECT * FROM follows WHERE id_poster='".$reg["id_user"]."' AND id_user='".$user["id_user"]."'";
                                    $result = mysqli_query($con, $sql);
                                    
                                    $rows = mysqli_num_rows($result);
                                    
                                    if($rows < 1) {
                                        ?>
                                            <button class="btn2 btn-outline-blue follow" id="<?php echo $reg["id_user"] ?>">
                                                Seguir
                                            </button>
                                        <?php
                                    } else {
                                        ?>
                                            <button class="btn2 btn-outline-red unfollow" id="<?php echo $reg["id_user"] ?>">
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
                                } ?>
                                <div class="posts-list-content">
                                <?php
                                $sql = "SELECT * FROM posts WHERE id_user=".$reg["id_user"];
                                $result = mysqli_query($con, $sql);
                                while ($reg = mysqli_fetch_array($result)) {
                                    ?>
                                        <img class="post" src="uploads/<?php echo $reg["post_img"] ?>">
                                    <?php
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
</body>
</html>