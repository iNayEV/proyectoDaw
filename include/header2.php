<div class="div-header-right">
                            <a href="new-post.php" class="c-pointer"><button class="btn2 btn-login">Publicar</button></a>
                            <?php 
                            $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
                            $result = mysqli_query($con, $sql);
                            $reg = mysqli_fetch_array($result);
                            $id_user = $reg["id_user"];
                            ?>
                            <ul id="ul-dropdown" class="ul_drop">
                                <li>
                                    <img class="prof-pic" src="<?php echo $reg["prof_img"] ?>" alt="">
                                    <div class="sub-menu">
                                        <div class="p-relative">
                                            <ul>
                                                <li>
                                                    <div class="drop-content">
                                                        <div class="d-flex">
                                                            <div class="f-left">
                                                                <img class="prof-pic prof-pic2" src="<?php echo $reg["prof_img"] ?>" alt="">
                                                            </div>
                                                            <div class="f-right">
                                                                <h3><?php echo $reg["firstname"]." ".$reg["lastname"] ?></h3>
                                                                <span>@<?php echo $reg["username"]?></span>
                                                            </div>
                                                        </div>                                                            
                                                        <div class="t-center mb-custom">
                                                            <hr class="hr-prof">
                                                            <a href="user.php?username=<?php echo $_SESSION["user"] ?>" class="c-pointer"><button class="btn2 btn-outline-blue mb-2 w-90">Ver mi perfil</button></a><br>
                                                            <button class="btn2 btn-outline-red w-90" id="modal">Cerrar sesión</button>
                                                            <div class="row d-flex">
                                                                <div class="col-sm-6">
                                                                    <span>Tema</span>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <form action="theme.php" method="GET">
                                                                        <input type="checkbox" id="toggle" class="toggle--checkbox" <?php if($reg["mode"]=="dark") { echo "checked"; } ?>>
                                                                        <label for="toggle" class="toggle--label">
                                                                            <span class="toggle--label-background"></span>
                                                                        </label>
                                                                        <div class="background"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
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