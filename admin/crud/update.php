<?php

include("conexion.php");
$con=conectar();

$id_user=$_POST['id_user'];
$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

$sql="UPDATE user SET  email='$email',firstname='$firstname',lastname='$lastname' WHERE id_user='$id_user'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: user.php");
    }
?>