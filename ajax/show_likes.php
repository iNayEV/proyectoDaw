<?php
    session_start();

    include("../sql/connect.php");

    $sql = "SELECT * FROM users WHERE username='".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);

    $sql = "SELECT * FROM likes INNER JOIN posts ON likes.id_post = posts.id_post WHERE likes.id_user=".$reg["id_user"];
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

?>
    <div class="remove-content">
        <div class="div-ul">
            <ul class="d-flex space-between">
                <li id="photos">
                    Mis fotos
                </li>
                <li class="line2">
                    Likes
                </li>
            </ul>
        </div>
        <div class="posts-list-content"><?php
            if ($rows > 0) {
                while ($reg = mysqli_fetch_array($result)) {
                    ?>
                        <img class="post" src="uploads/<?php echo $reg["post_img"] ?>">
                    <?php
                }
            } else {?>
                <p>Todavía no has marcado me gusta</p>
                <?php
            } ?>
        </div>
    </div>