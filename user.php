<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("sql/connect.php");
        include("head.php");
    ?>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container mt-custom">
        <div class="row">
            <?php
                include("feed-left.php");
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
</body>
</html>