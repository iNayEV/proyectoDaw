
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_user,
firstname,
lastname,
email,
num,
prof_descrip,
verify,
administrator,
username,
prof_img
from users";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Username</td>
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Email</td>
				<td>Number</td>
				<td>Description</td>
				<td>Verification</td>
				<td>Administrator</td>
				<td>Profile picture</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Username</td>
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Email</td>
				<td>Number</td>
				<td>Description</td>
				<td>Verification</td>
				<td>Administrator</td>
				<td>Profile picture</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr>
					<td>@<?php echo $mostrar[8] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
					<td class="t-center"><?php 
						if ($mostrar[6] == 1) {
							echo '<i class="fas fa-check-circle text-blue"></i>';
						} else {
							echo '<i class="fas fa-circle text-blue"></i>';
						}
					?></td>
					<td class="t-center"><?php 
						if ($mostrar[7] == 1) {
							echo '<i class="fas fa-lock-open text-green"></i>';
						} else {
							echo '<i class="fas fa-lock"></i>';
						}
					?></td>
					<td class="t-center"><img class="prof-pic prof-pic-crud" src="../<?php echo $mostrar[9] ?>" alt=""></td>
					<!-- <td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil-square-o"></span>
						</span>
					</td> -->
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
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