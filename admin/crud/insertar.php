<?php
include("conexion.php");
$con=conectar();

$id_user=$_POST['id_user'];
$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];


$sql="INSERT INTO user VALUES('$id_user','$email','$firstname','$lastname')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: user.php");
    
}else {
}
?>