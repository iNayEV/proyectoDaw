<?php
    session_start();

    $id_poster = $_POST["id"];

    include("sql/connect.php");
    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql) or exit(mysqli_error($con));
    $user = mysqli_fetch_array($result);

    $id_user = $user["id_user"];

    $sql = "INSERT INTO follows VALUE (null,$id_user,$id_poster)";
    $result = mysqli_query($con, $sql);
    
    $sql = "SELECT * FROM users WHERE id_user = $id_poster";
    $result = mysqli_query($con, $sql) or exit(mysqli_error($con));
    $reg = mysqli_fetch_array($result);

    $followers = $reg["followers"];

    $followers += 1;

    ?>
    <div class="button-follow">
        <?php 
            if (isset($_SESSION["user"])) {
                $sql = "UPDATE users SET followers = $followers WHERE id_user = $id_poster";
                $result = mysqli_query($con, $sql);
                $sql = "SELECT * FROM users WHERE id_user = $id_poster";
                $result = mysqli_query($con, $sql) or exit(mysqli_error($con));
                $reg = mysqli_fetch_array($result);
                $sql = "SELECT * FROM follows WHERE id_poster='".$id_poster."' AND id_user='".$id_user."'";
                $result = mysqli_query($con, $sql);
                ?>
                <div class="button-follow">
                    <span><i class="fa-solid fa-users"></i><?php echo $reg["followers"] ?></span>
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
                                    <span class="follow marginb-2 c-pointer text-blue" id="<?php echo $reg["id_user"] ?>">
                                        <i class="fa-solid fa-heart-circle-plus"></i>
                                    </span>
                                    <span class="unfollow marginb-2 c-pointer text-red follow-fx" id="<?php echo $reg["id_user"] ?>">
                                        <i class="fa-solid fa-heart-circle-minus"></i>
                                    </span>
                                <?php
                            } else {
                                ?>
                                    <span class="unfollow marginb-2 c-pointer text-red" id="<?php echo $reg["id_user"] ?>">
                                        <i class="fa-solid fa-heart-circle-minus"></i>
                                    </span>
                                    <span class="marginb-2 c-pointer text-blue follow-fx" id="<?php echo $reg["id_user"] ?>">
                                        <i class="fa-solid fa-heart-circle-plus"></i>
                                    </span>
                                <?php
                            }
                        }
                    ?>
                </div> <?php
            }
        ?>
    </div>
    