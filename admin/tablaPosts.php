
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Username</td>
				<td>Description</td>
				<td>Likes count</td>
				<td>Publication date</td>
				<td>Image</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
                <td>Username</td>
				<td>Description</td>
				<td>Likes count</td>
				<td>Publication date</td>
				<td>Image</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_array($result)) {
				?>
				<tr>
					<td>@<?php echo $mostrar["username"] ?></td>
					<td><?php echo $mostrar["post_descrip"] ?></td>
					<td><?php echo $mostrar["likes"] ?></td>
					<td><?php echo $mostrar["date"] ?></td>
					<td><img src="../uploads/<?php echo $mostrar["post_img"] ?>" class="post"></td>
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar['id_post'] ?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>