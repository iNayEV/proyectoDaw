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
                    <p>Inicia sesión para seguir creadores y dar like a videos</p>
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
                                $prof_img = $reg["prof_img"];
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