<?php
if(!empty($_POST["id"])){
    
    // Include the database configuration file
    include 'sql/connect.php';
    
    $id = $_POST["id"];

    // Count all records except already displayed
    $sql = "SELECT COUNT(*) as num_rows FROM users WHERE id_user > ".$id;
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);
    $totalRowCount = $reg['num_rows'];
    
    $showLimit = 4;
    
    // Get records from the database
    $sql = "SELECT * FROM users WHERE id_user > $id LIMIT $showLimit";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    if($rows > 0){ 
        while($reg = mysqli_fetch_array($result)){
            $id = $reg["id_user"];
            $img = "uploads/".$reg["img"];
            $username = "@".$reg["username"];
            $firstname = $reg["firstname"];
            $lastname = $reg["lastname"];
            ?>
            <li class="mb-4">
                <div class="d-flex">
                    <img class="suggestedAccountIcon" src="<?php echo $img ?>">
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
        <?php if($totalRowCount > $showLimit){ ?>
        <div class="show_more_main" id="show_more_main<?php echo $id; ?>">
            <span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>
<?php
    }
}
?>