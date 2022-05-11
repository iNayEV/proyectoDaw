<?php 

session_start();

include("../sql/connect.php");

$sql = "SELECT * FROM users WHERE username ='".$_SESSION["user"]."'";
$result = mysqli_query($con, $sql);
$reg = mysqli_fetch_array($result);

$descrip = $_POST["post-descrip"];

$descrip_arr = str_split($descrip);

if($descrip != "") {
    $i = count($descrip_arr);
    if ($descrip_arr[$i-1] != ".") {
        $descrip = $descrip.".";
    }
}

echo $descrip;

$img_name = $_FILES['post-img']['name'];
$img_size = $_FILES['post-img']['size'];
$tmp_name = $_FILES['post-img']['tmp_name'];
$error = $_FILES['post-img']['error'];

if ($error === 0) {
    if ($img_size > 2000000) {
        $em = "Sorry, your file is too large.";
        header("Location: index.php?error=$em");
    }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = '../uploads/'.$new_img_name;
            if(move_uploaded_file($tmp_name, $img_upload_path)) {
                echo "<img src=".$img_upload_path.">";
                $sql = "INSERT INTO posts VALUES(null,".$reg["id_user"].",'$new_img_name','$descrip',0)";

                echo $sql;
						
                $result = mysqli_query($con, $sql);
	
                header("Location: ../index.php?info=uploaded");
            }else {
                echo "file no uploaded";
                header("Location: ../index.php?info=not-uploaded");
            }
        }
    }
}