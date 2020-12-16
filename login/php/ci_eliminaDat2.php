<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM datos2 WHERE coddt = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM datos2 ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			         <tr>
			                <td width="25%" align="center">Descripcion del Video</td>
			                <td width="25%" align="center">Direccion URL</td>

							<td width="10%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['detalle'].'</td>
							<td align="center">'.$registro2['videodat'].'</td>
							<td align="center"><a href="javascript: editarDat2('.$registro2['coddt'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarDat2('.$registro2['coddt'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 
							   </td>
						  </tr>';
	}
echo '</table>';
?>