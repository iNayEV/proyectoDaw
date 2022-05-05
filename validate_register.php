<?php 

include("sql/connect.php");

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];
$hash = password_hash($passwd,PASSWORD_DEFAULT);
$num = $_POST["phone-number"];

if (isset($_POST['submit']) && isset($_FILES['post-img'])) {

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
				$sql = "SELECT * FROM users WHERE username = '$username'";

				$result = mysqli_query($con, $sql);

				$rows = mysqli_num_rows($result);

    			if($rows) {
					header("Location: register.php?error=username");
				} else {
					$sql = "SELECT * FROM users WHERE email = '$email'";

					$result = mysqli_query($con, $sql);

					$rows = mysqli_num_rows($result);

					if($rows) {
						header("Location: register.php?error=email");
					} else {
						$sql = "INSERT INTO users VALUES(null,'$email','$username','$hash','$firstname','$lastname','$num','$descrip',0,0,'$img_upload_path')";
						
						$result = mysqli_query($con, $sql);
						
						session_start();
						
						$_SESSION["user"] = $username;
	
						header("Location: index.php");
					}
				}

			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		// $em = "unknown error occurred!";
		// header("Location: index.php?error=$em");
		$sql = "INSERT INTO users VALUES(null,'$email','$username','$hash','$firstname','$lastname','$num','$descrip',0,0,'uploads/default-img.jpg','light')";
						
		$result = mysqli_query($con, $sql);

		session_start();
						
		$_SESSION["user"] = $username;

		header("Location: index.php");
	}
}