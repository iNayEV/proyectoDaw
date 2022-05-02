<?php

include("conexion.php");
$con=conectar();

$id_user=$_GET['id'];

$sql="DELETE FROM user  WHERE id_user='$id_user'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: user.php");
    }
?>