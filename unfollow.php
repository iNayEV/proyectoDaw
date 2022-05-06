<?php
    session_start();

    $id_poster = $_POST["id"];

    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql) or exit(mysqli_error($con));
    $user = mysqli_fetch_array($result);

    $id_user = $user["id_user"];

    $sql = "DELETE FROM follows WHERE id_user=$id_user AND id_poster=$id_poster";
    $result = mysqli_query($con, $sql);
    
    ?>
    <div class="button-follow">
        <?php 
            if (isset($_SESSION["user"])) {
                // $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user";
                $sql = "SELECT * FROM follows WHERE id_poster='".$id_poster."' AND id_user='".$id_user."'";
                $result = mysqli_query($con, $sql);
                
                $rows = mysqli_num_rows($result);
                
                if($rows < 1) {
                    ?>
                        <button class="btn2 btn-outline-blue mr-custom <?php if (!isset($_SESSION["user"])) { echo "follow-noAcc"; }else{ echo "follow"; } ?>">
                            Seguir
                        </button>
                    <?php
                } else {
                    ?>
                        <button class="btn2 btn-outline-red mr-custom unfollow">
                            Dejar de seguir
                        </button>
                    <?php
                }
            }
        ?>
    </div>
    