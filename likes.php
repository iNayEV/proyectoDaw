<?php 

    session_start();

    include("sql/connect.php");
    
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);
    $id_user = $reg["id_user"];

    $id_post = $_POST["id"];

    $sql = "SELECT * FROM posts WHERE id_post = ".$id_post;
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);
    
    $likes = $reg["likes"] + 1;
    $sql = "UPDATE posts SET likes=".$likes." WHERE id_post=".$id_post;
    $result = mysqli_query($con, $sql);
  
    $sql = "INSERT INTO likes VALUES (null,$id_user,$id_post,'".date("G:i:s d-m-Y")."')";
    $result = mysqli_query($con, $sql);

    $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        while ($reg = mysqli_fetch_array($result)) {
            $id = $reg["id_post"];
            $post_img = "uploads/".$reg["post_img"];
            $desc = $reg["post_descrip"];
            $likes = $reg["likes"];
            $prof_img = $reg["prof_img"];
            $username = "@".$reg["username"];
            ?>
            <div class="delete">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="align-items: center;">
                        <a href="#">
                            <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                        </a>
                        <div>
                            <a href="#" class="user-prof">
                                <h6 class="mb-0 fw-bold">
                                    <?php echo $username ?>
                                    <!-- <?php 
                                        if ($reg["administrator"] == 1) {
                                            ?>
                                                <i class="fas fa-check-circle text-blue"></i>
                                            <?php
                                        }
                                    ?> -->
                                </h6>
                            </a>
                            <small><?php echo $desc ?></small>
                        </div>
                    </div>
                    <div class="ajax-follow">
                        <div class="button-follow">
                            <?php 
                                if (isset($_SESSION["user"])) {
                                    // $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user";
                                    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
                                    $result = mysqli_query($con, $sql);
                                    $user = mysqli_fetch_array($result);
                                    $sql = "SELECT * FROM follows WHERE id_poster='".$reg["id_user"]."' AND id_user='".$user["id_user"]."'";
                                    $result = mysqli_query($con, $sql);
                                    
                                    $rows = mysqli_num_rows($result);
                                    
                                    if($rows < 1) {
                                        ?>
                                            <button class="btn2 btn-outline-blue mr-custom follow" id="<?php echo $reg["id_user"] ?>">
                                                Seguir
                                            </button>
                                        <?php
                                    } else {
                                        ?>
                                            <button class="btn2 btn-outline-red mr-custom unfollow" id="<?php echo $reg["id_user"] ?>">
                                                Dejar de seguir
                                            </button>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <button class="btn2 btn-outline-blue mr-custom follow-noAcc">
                                            Seguir
                                        </button>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="wrap-center">
                    <div class="mt-3 d-flex align-items-end item-center">
                        <img src="<?php echo $post_img ?>" class="tikTok_screen_img">
                        <div class="ms-3">
                            <div class="d-flex flex-column align-items-center" id="likes<?php echo $id ?>">
                                <?php 
                                    if (isset($_SESSION["user"])) {
                                        $sql = "SELECT * FROM likes WHERE id_user=".$id_user." AND id_post=".$id;
                                        $result = mysqli_query($con, $sql);
                                        $rows = mysqli_num_rows($result);
                                        if($rows > 0) {
                                            ?>
                                                <div class="like-red" id="<?php echo $id ?>">
                                                    <i class="fas fa-heart"></i>
                                                </div>
                                                <span class="likes"><?php echo $likes ?></span>
                                            <?php
                                        } else {
                                            ?>
                                                <div class="actions_tikTok" id="<?php echo $id ?>">
                                                    <i class="fas fa-heart"></i>
                                                </div>
                                                <span class="likes"><?php echo $likes ?></span>
                                            <?php
                                        }
                                        $sql = "SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user WHERE id_post >".$id;
                                        $result = mysqli_query($con, $sql);
                                    } else {
                                        ?>
                                            <div class="likes-noAcc" id="<?php echo $id ?>">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <span class="likes"><?php echo $likes ?></span>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5 w-custom">
            </div>
            <?php
        } ?>
        <!-- <div class="show_more_main" id="show_more_main<?php echo $id; ?>">
            <span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div> -->
        <?php
    }
    ?>
    <script>
        function convertNum() {
            var likes = document.getElementsByClassName("likes");
            Array.from(likes).forEach((element) => {
                var num = element.textContent;
                if (num > 9999) {
                    num = Math.round(num/100)*100;
                    num = num.toString();
                    while (num[num.length-1] == "0") {           
                        num = num.slice(0, -1);
                        if (num[num.length-1] != "0") {break;}
                    }
                    console.log(num);
                    num_arr = num.split('');
                    if (num_arr.length > 1) {
                        num = "";
                        for(i = 0; i < num_arr.length; i++) {
                            if (i + 1 == num_arr.length) {
                                num = num+","+num_arr[i];
                            } else {
                                num = num+num_arr[i];
                            }
                        }
                    }
                    element.innerHTML = num+"K";
                }
            });
        }
        
        convertNum();
    </script>