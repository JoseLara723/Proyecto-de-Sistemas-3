<?php
include('conexion.php');

$id = $_POST['id'];



mysqli_query($conexion,"DELETE FROM sucursal WHERE codsuc = '$id'");



$registro = mysqli_query($conexion,"SELECT * FROM sucursal");


echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Sucursal</td>
			                <td width="10%">Opciones</td>

			            </tr>';
	$tadm='';			

	while($registro2 = mysqli_fetch_array($registro)){
		
		echo '<tr>
							<td>'.$registro2['detsucursal'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['codsuc'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['codsuc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>