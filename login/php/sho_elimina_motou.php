<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];

include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM personalmoto WHERE coden = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM personalmoto AS pm LEFT JOIN personal AS pe ON pm.id_per=pe.id_per WHERE codsuc='$codsucx' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Nombre</td>
			                <td width="10%">CI.</td>
			                <td width="10%">Direccion</td>
			                <td width="10%">Telf/Cel</td>
			                <td width="10%">Placa</td>
			                <td width="5%">Asignado</td>

			                <td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			

	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombreper'].'</td>
							<td>'.$registro2['ciper'].'</td>
							<td>'.$registro2['direccper'].'</td>
							<td>'.$registro2['celper'].'</td>
							<td>'.$registro2['placa'].'</td>
							<td>'.$registro2['asignado'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['coden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['coden'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>