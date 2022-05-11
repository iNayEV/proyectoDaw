<?php
    session_start();

    include("../sql/connect.php");

    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);

    $sql = "SELECT * FROM posts WHERE id_user=".$reg["id_user"];
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

?>
    <div class="remove-content">
        <div class="div-ul">
            <ul class="d-flex space-between">
                <li class="line3">
                    Mis fotos
                </li>
                <li id="likes">
                    Likes
                </li>
            </ul>
        </div>
        <div class="posts-list-content <?php if(!$rows) { echo "d-flex-center"; } ?>">
        <?php
            if($rows > 0) {
                while ($reg = mysqli_fetch_array($result)) {
                    ?>
                            <img class="post" src="uploads/<?php echo $reg["post_img"] ?>">
                    <?php
                }
            } else {?>
                    <div id="post" class="div-center">
                        Aún no has realizado ninguna publicación
                    </div>
                <?php
            } ?>
        </div>
    </div>