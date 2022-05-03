<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("sql/connect.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="css/custom.css">
    <?php 
        $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
        $result = mysqli_query($con, $sql);
        $reg = mysqli_fetch_array($result);
        if ($reg["mode"]=="dark") {
            ?>
            <link rel="stylesheet" href="css/dark-mode.css">
            <link rel="stylesheet" href="css/scroll-dark.css">
            <?php
        } else {
            ?>
            <link rel="stylesheet" href="css/scroll-light.css">
            <?php
        }
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="header">
            <div class="header-wrap">
                <a href="/"><img class="logo-img" src="img/logo-example.png" alt=""></a>
                <?php
                    if(!isset($_SESSION["user"])) {
                        ?>
                            <a href="login.php" class="c-pointer"><button class="btn2 btn-login">Iniciar sesión</button></a>
                            <?php
                    }else{
                        ?>
                            <div class="div-header-right">
                                <a href="new-post.php" class="c-pointer"><button class="btn2 btn-login">Publicar</button></a>
                                <?php 
                                $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
                                $result = mysqli_query($con, $sql);
                                $reg = mysqli_fetch_array($result);
                                ?>
                                <ul class="ul_drop">
                                    <li>
                                        <img class="prof-pic" src="uploads/<?php echo $reg["prof_img"] ?>" alt="">
                                        <div class="sub-menu">
                                            <div class="p-relative">
                                                <ul>
                                                    <li>
                                                        <div class="drop-content">
                                                            <div class="d-flex">
                                                                <div class="f-left">
                                                                    <img class="prof-pic prof-pic2" src="uploads/<?php echo $reg["prof_img"] ?>" alt="">
                                                                </div>
                                                                <div class="f-right">
                                                                    <h3><?php echo $reg["firstname"]." ".$reg["lastname"] ?></h3>
                                                                    <span>@<?php echo $reg["username"]?></span>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="t-center">
                                                                <hr class="hr-prof">
                                                                <a href="#" class="c-pointer"><button class="btn2 btn-outline-blue mb-2 w-90">Editar perfil</button></a><br>
                                                                <button class="btn2 btn-outline-red w-90" id="modal">Cerrar sesión</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                    if($reg["administrator"]==1) {
                                        ?>
                                        <a href="admin/crud/user.php" class="c-pointer ml-2rem"><button class="btn2 btn-admin">Administración</button></a>
                                        <?php
                                    }
                                ?>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </header>

    <div class="container mt-custom">
        <div class="row">
            <div class="col-sm-4 p-custom">
                <div class="p-fixed ofy-auto side-nav">
                    <!-- <div>
                        <a class="d-flex align-items-center text-pink h5">
                            <i class="fas fa-home"></i>
                            <span class="ms-2">FyP</span>
                        </a>
                        <a class="d-flex align-items-center h5">
                            <i class="fas fa-user-friends"></i>
                            <span class="ms-2">Seguimiento</span>
                        </a>
                    </div> -->
                    <!-- <hr class="my-5"> -->
                    <?php 
                        if (!isset($_SESSION["user"])) {
                            ?>
                            <div>
                                <p>Inicia sesión para seguir creadores, dar like a videos, y ver comentarios.</p>
                                <a href="login.php">
                                    <div style="text-align: center" class="btn2 btn-mw-none btn-outline-blue w-100 p-2">
                                        <b>Iniciar sesión</b>
                                    </div>
                                </a>
                            </div>
                            <hr class="my-4">
                            <?php
                        }
                        ?>
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Cuentas relacionadas</span>
                            <!-- <a href="#" class="text-pink">Ver más</a> -->
                        </div>
                        <div class="mt-2">
                            <ul class="usersList">
                                <?php
                                    $sql = "SELECT * FROM users LIMIT 4";
                                    $result = mysqli_query($con, $sql);
                                    $rows = mysqli_num_rows($result);
                                    if ($rows > 0) {
                                        while ($reg = mysqli_fetch_array($result)) {
                                            $id = $reg["id_user"];
                                            $prof_img = "uploads/".$reg["prof_img"];
                                            $username = "@".$reg["username"];
                                            $firstname = $reg["firstname"];
                                            $lastname = $reg["lastname"];
                                            ?>
                                            <li class="mb-4">
                                                <div class="d-flex" style="align-items: center;">
                                                    <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">
                                                            <?php echo $firstname ?> <?php echo $lastname ?>
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
                                            </li>
                                            <?php
                                        } ?>
                                        <div class="show_more_main" id="show_more_main<?php echo $id; ?>">
                                            <span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
                                            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Descubre</span>
                        </div>
                        <div>
                            <a href="#" class="badge rounded-pill border border-secondary text-dark m-2"># Discover</a>
                            <span class="badge rounded-pill border border-secondary text-dark m-2"># Dance</span>
                            <span class="badge rounded-pill border border-secondary text-dark m-2"># Challenge</span>
                            <!-- <span class="badge rounded-pill border border-secondary text-dark m-2"><i class="fas fa-music"></i> 
                            Duro 2 horas - Faraón Love Shady ( Vídeo Oficial )</span>
                            <span class="badge rounded-pill border border-secondary text-dark m-2"><i class="fas fa-music"></i> Quevedo - AHORA 2 | Freestyle</span> -->
                        </div>
                    </div>
                    <hr>
                    <div>
                        &copy; Liberty
                    </div>
                </div>
            </div>
            <div class="col-sm-8 theme-dark p-custom">
                <div class="mb-5">
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
                                $prof_img = "uploads/".$reg["prof_img"];
                                $username = "@".$reg["username"];
                                ?>
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex" style="align-items: center;">
                                            <img class="suggestedAccountIcon prof-pic" src="<?php echo $prof_img ?>">
                                            <div>
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
                                                <small><?php echo $desc ?></small>
                                            </div>
                                        </div>
                                        <a href="#" class="btn2 btn-outline-blue mr-custom">
                                            Seguir
                                        </a>
                                    </div>
                                    <div class="wrap-center">
                                        <div class="mt-3 d-flex align-items-end item-center">
                                            <img src="<?php echo $post_img ?>" class="tikTok_screen_img">
                                            <div class="ms-3">
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="actions_tikTok">
                                                        <i class="fas fa-heart"></i>
                                                    </div>
                                                    <span class="likes"><?php echo $likes ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-5 w-custom">
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
    <div id="button-up" class="button-up">
        <i class="fas fa-chevron-up"></i>
    </div>
    <script>
        function convertNum() {
            var likes = document.getElementsByClassName("likes");
            Array.from(likes).forEach((element) => {
                var num = element.textContent;
                num = Math.round(num/100)*100;
                num = num.toString();
                while (num[num.length-1] == "0") {           
                    num = num.slice(0, -1);
                    if (num[num.length-1] != "0") {break;}
                }
                num_arr = num.split('');
                num = "";
                for(i = 0; i < num_arr.length; i++) {
                    if (i + 1 == num_arr.length) {
                        num = num+","+num_arr[i];
                    } else {
                        num = num+num_arr[i];
                    }
                }
                element.innerHTML = num+"K";
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