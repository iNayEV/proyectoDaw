<?php
    session_start();
    include("../sql/connect.php");

    echo "<pre>";
    print_r($_FILES['prof-img']);
    echo "</pre>";

    if(!isset($_SESSION["user"]) || $_SESSION["user"] != $_POST["username"] ){
        header("location: ../index.php");
    }

    if(!isset($_FILES['prof-img'])) {
        $sql = "UPDATE users SET firstname ='".$_POST["firstname"]."', lastname = '".$_POST["lastname"]."', email = '".$_POST["email"]."', num = '".$_POST["num"]."', descrip = '".$_POST["descrip"]."' WHERE username = '".$_POST["username"]."'";
        $result = mysqli_query($con, $sql);
        header("location: ../user.php?username=".$_POST["username"]);
    } else {
        $img_name = $_FILES['prof-img']['name'];
        $img_size = $_FILES['prof-img']['size'];
        $tmp_name = $_FILES['prof-img']['tmp_name'];
        $error = $_FILES['prof-img']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
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
                    }else {
                        echo "file no uploaded";
                    }
                }

                $sql = "UPDATE users SET firstname ='".$_POST["firstname"]."', lastname = '".$_POST["lastname"]."', email = '".$_POST["email"]."', num = '".$_POST["num"]."', prof_descrip = '".$_POST["descrip"]."', prof_img = 'uploads/".$new_img_name."' WHERE username = '".$_POST["username"]."'";
                echo $sql;
                $result = mysqli_query($con, $sql);

                header("location: ../user.php?username=".$_POST["username"]);
            }
        }
    }
    
?>