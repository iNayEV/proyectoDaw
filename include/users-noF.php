<?php
    session_start();
    include("../sql/connect.php");
    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);

    $id_user_session = $reg["id_user"];
    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);

    $id_user_session = $reg["id_user"];
    $sql = "SELECT * FROM users LIMIT 4";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        while ($reg = mysqli_fetch_array($result)) {
            if ($_SESSION["user"] != $reg["username"]) {
                $id = $reg["id_user"];
                $prof_img = $reg["prof_img"];
                $username = "@".$reg["username"];
                $firstname = $reg["firstname"];
                $lastname = $reg["lastname"];
                $sql = "SELECT * FROM follows WHERE id_user=$id_user_session AND id_poster=$id";
                $res = mysqli_query($con, $sql);
                $row = mysqli_num_rows($res);
                if ($row < 1) {
                ?>
                <li class="mb-4">
                <div class="d-flex space-between w-95">
                        <div class="d-flex" style="align-items: center;">
                            <a href="user.php?username=<?php echo $reg["username"] ?>">
                                <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                            </a>
                            <div>
                                <h6 class="mb-0 fw-bold">
                                    <a href="user.php?username=<?php echo $reg["username"] ?>">
                                        <?php echo $firstname ?> <?php echo $lastname ?>
                                    </a>
                                    <?php 
                                        if ($reg["administrator"] == 1) {
                                            ?>
                                                <i class="fas fa-check-circle text-blue"></i>
                                            <?php
                                        }
                                    ?>
                                </h6>
                                <small><?php echo $username ?></small>
                            </div>
                        </div>
                        <div>
                            <div class="ajax-follow">
                                <div class="button-follow">
                                    <?php 
                                        if (isset($_SESSION["user"])) {
                                            // $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user";
                                            $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
                                            $res = mysqli_query($con, $sql);
                                            $user = mysqli_fetch_array($res);
                                            $sql = "SELECT * FROM follows WHERE id_poster='".$reg["id_user"]."' AND id_user='".$user["id_user"]."'";
                                            $res = mysqli_query($con, $sql);
                                            
                                            $rows = mysqli_num_rows($res);
                                            
                                            if($rows < 1) {
                                                ?>
                                                    <span class="follow2 marginb-2 c-pointer text-blue fs-25" id="<?php echo $reg["id_user"] ?>">
                                                        <i class="fa-solid fa-heart-circle-plus"></i>
                                                    </span>
                                                <?php
                                            } else {
                                                ?>
                                                    <span class="unfollow2 marginb-2 c-pointer text-red fs-25" id="<?php echo $reg["id_user"] ?>">
                                                        <i class="fa-solid fa-heart-circle-minus"></i>
                                                    </span>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <span class="follow-noAcc marginb-2 c-pointer text-blue fs-25">
                                                    <i class="fa-solid fa-heart-circle-plus"></i>
                                                </span>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
                }
            } else if (!isset($_SESSION["user"])) {
                $id = $reg["id_user"];
                $prof_img = $reg["prof_img"];
                $username = "@".$reg["username"];
                $firstname = $reg["firstname"];
                $lastname = $reg["lastname"];
                ?>
                <li class="mb-4">
                <div class="d-flex space-between w-95">
                        <div class="d-flex" style="align-items: center;">
                            <a href="user.php?username=<?php echo $reg["username"] ?>">
                                <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                            </a>
                            <div>
                                <h6 class="mb-0 fw-bold">
                                    <a href="user.php?username=<?php echo $reg["username"] ?>">
                                        <?php echo $firstname ?> <?php echo $lastname ?>
                                    </a>
                                    <?php 
                                        if ($reg["administrator"] == 1) {
                                            ?>
                                                <i class="fas fa-check-circle text-blue"></i>
                                            <?php
                                        }
                                    ?>
                                </h6>
                                <small><?php echo $username ?></small>
                            </div>
                        </div>
                        <div>
                            <div class="ajax-follow">
                                <div class="button-follow">
                                    <?php 
                                        if (isset($_SESSION["user"])) {
                                            // $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user";
                                            $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
                                            $res = mysqli_query($con, $sql);
                                            $user = mysqli_fetch_array($res);
                                            $sql = "SELECT * FROM follows WHERE id_poster='".$reg["id_user"]."' AND id_user='".$user["id_user"]."'";
                                            $res = mysqli_query($con, $sql);
                                            
                                            $rows = mysqli_num_rows($res);
                                            
                                            if($rows < 1) {
                                                ?>
                                                    <span class="follow2 marginb-2 c-pointer text-blue fs-25" id="<?php echo $reg["id_user"] ?>">
                                                        <i class="fa-solid fa-heart-circle-plus"></i>
                                                    </span>
                                                <?php
                                            } else {
                                                ?>
                                                    <span class="unfollow2 marginb-2 c-pointer text-red fs-25" id="<?php echo $reg["id_user"] ?>">
                                                        <i class="fa-solid fa-heart-circle-minus"></i>
                                                    </span>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <span class="follow-noAcc marginb-2 c-pointer text-blue fs-25">
                                                    <i class="fa-solid fa-heart-circle-plus"></i>
                                                </span>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
        } ?>
        <div class="show_more_main" id="show_more_main<?php echo $id; ?>">
            <span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
            <?php
                if (isset($_SESSION["user"])) {
                    ?>
                        <span id="<?php echo $_SESSION["user"] ?>" class="show_more_username"></span>
                    <?php
                }
            ?>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
        <?php
    }
?>