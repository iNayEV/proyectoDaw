<?php 

	class crud{
		public function eliminar($id_user){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from users where id_user='$id_user'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminarPost($id_post){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from posts where id_post=$id_post";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>