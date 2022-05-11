<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
	<link rel="stylesheet" href="css/crud.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="crud">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						<p>Administration Liberty</p>
						<span>
							/<a href="../index.php" class="text-darkblue">index.php</a>/administration.php
						</span>
					</div>
					<div class="card-body">
						<span class="btn btn-primary" onclick="loadUsers()">
							Users
						</span>
						<span class="btn btn-primary" onclick="loadPosts()">
							Posts
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script>
	function loadPosts() {
		$('#tablaDatatable').load('tablaPosts.php');
	}
	function loadUsers() {
		document.location.reload(true);
	}
</script>

<script type="text/javascript">
	function eliminarDatos(id_user){
		alertify.confirm('Delete user', 'Do you want to delete this user?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_user=" + id_user,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>

<script>
	function eliminarDatosPosts(id_post){
		alertify.confirm('Delete post', 'Do you want to delete this post?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_post=" + id_post,
				url:"procesos/eliminarPost.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablaPosts.php');
						alertify.success("Deleted!");
					}else{
						alertify.error("Couldn't delete...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>