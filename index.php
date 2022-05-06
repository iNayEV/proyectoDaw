<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("sql/connect.php");
        include("head.php");
    ?>
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
            <div class="col-sm-8 theme-dark p-custom">
                <div class="mb-5 posts-list">
                    <?php
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
                                $username = $reg["username"];
                                ?>
                                <div class="delete">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex" style="align-items: center;">
                                            <a href="user.php?username=<?php echo $username ?>">
                                                <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                                            </a>
                                            <div>
                                                <a href="user.php?username=<?php echo $username ?>" class="user-prof">
                                                    <h6 class="mb-0 fw-bold">
                                                        <?php echo "@".$username ?>
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
                </div>
            </div>
        </div>
    </div>

    <div id="div-modal" class="div-modal">
        <div class="modal-content">
            <button onclick="closeModal()" class="btn-none r-pos"><span name="span-close" class="close">&times;</span></button>
            <h3 class="margint-2">¿Quieres cerrar sesión?</h3>
            <p class="marginb-4">Cerrara la sesión. No se eliminara el usuario.</p>
            
            <div class="d-flex r-pos r-pos2">
                <button class="btn2 btn-cancel" onclick="closeModal()">Cancelar</button>
                <form action="logout.php" method="POST">
                    <button type="submit" name="logout" class="btn2 btn-admin">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>

    <div id="div-modal-login" class="div-modal">
        <div class="modal-content modal-content-login">
            <div class="text-content">
                <button onclick="closeModalLogIn()" class="btn-none r-pos-login"><span name="span-close" class="close">&times;</span></button>
                <h3 class="margint-2">No has iniciado <span>sesió</span>n.</h3>
                <p class="marginb-2">Escoja una opcion.</p>
                
                <a href="login.php" class="text-dec-none">
                    <div class="google-div">
                        <span class="d-flex-login">Continuar con Liberty</span>
                    </div>
                </a>
                <?php require ("auth.php") ?>
                <a href="<?php echo $client->createAuthUrl() ?>" class="text-dec-none">
                    <div class="google-div">
                        <span class="d-flex-login"><img src="uploads/google.png" width="25px" alt="">Continuar con Google</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="button-up" class="button-up">
        <i class="fas fa-chevron-up"></i>
    </div>

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
    
    <script>
        document.getElementById("button-up").addEventListener("click", scrollUp);
        
        function scrollUp(){
            var currentScroll = document.documentElement.scrollTop;
            
            if (currentScroll > 0){
                window.scrollTo({top: 0, behavior: 'smooth'});
            }
        }
        
        buttonUp = document.getElementById("button-up");
        
        window.onscroll = function(){
            
            var scroll = document.documentElement.scrollTop;
            
            if (scroll > 500){
                buttonUp.classList.add("button-scale");
            }else if(scroll < 500){
                buttonUp.classList.remove("button-scale");
            }
            
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.toggle--label',function(){
                $.ajax({
                    method: "POST",
                    url:'theme.php',
                    data: {text: ""}
                });
                setTimeout(() => {
                    document.location.reload(true);
                }, 500);
            });
        });
    </script>

    <script src="js/follow.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.like-red',function(){
                console.log($(this).attr("id"));
                var ID = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:'dislikes.php',
                    data:'id='+ID,
                    success:function(html){
                        $('.delete').remove();
                        $('.posts-list').append(html);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.actions_tikTok',function(){
                console.log($(this).attr("id"));
                var ID = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:'likes.php',
                    data:'id='+ID,
                    success:function(html){
                        $('.delete').remove();
                        $('.posts-list').append(html);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.show_more',function(){
                console.log($(this).attr("id"));
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loding').show();
                setTimeout(() => {
                    $.ajax({
                        type:'POST',
                        url:'ajax_more.php',
                        data:'id='+ID,
                        success:function(html){
                            $('#show_more_main'+ID).remove();
                            $('.usersList').append(html);
                        }
                    });
                }, 500);
            });
        });
    </script>

    <script>
        var modalLogin = document.getElementById("div-modal-login");

        function closeModalLogIn() {
            modalLogin.style.display = "none";
        }

        $(document).on('click','.likes-noAcc',function(){
            modalLogin.style.display = "block";
        });

        $(document).on('click','.follow-noAcc',function(){
            modalLogin.style.display = "block";
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modalLogin.style.display = "none";
            }
        }
    </script>

    <script>
        var modal = document.getElementById("div-modal");

        var btn = document.getElementById("modal");

        function closeModal() {
            modal.style.display = "none";
        }

        btn.onclick = function() {
            modal.style.display = "block";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>