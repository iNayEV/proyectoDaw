<?php 

if (isset($_POST['submit']) && isset($_FILES['post-img'])) {
	// include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['post-img']);
	echo "</pre>";

	$img_name = $_FILES['post-img']['name'];
	$img_size = $_FILES['post-img']['size'];
	$tmp_name = $_FILES['post-img']['tmp_name'];
	$error = $_FILES['post-img']['error'];

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
				$img_upload_path = 'uploads/'.$new_img_name;
				if(move_uploaded_file($tmp_name, $img_upload_path)) {
                    echo "<img src=".$img_upload_path.">";
                }else {
                    echo "file no uploaded";
                }
	// 			Insert into Database
				include("sql/connect.php");
				$sql = "INSERT INTO posts VALUES(null,1,'$new_img_name',date('d-m-Y'),'')";
				mysqli_query($con, $sql);
				header("Location: index.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}

}else {
	header("Location: index.php");
}