<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM datos1 WHERE coddt = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM datos1 ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			         <tr>
			                <td width="25%" align="center">Descripcion de la Imagen</td>
			                <td width="5%" align="center">Imagen</td>

							<td width="10%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['detalle'].'</td>
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['coddt'].');" ><img src="'.$registro2['fotodat'].'" width="30" height="30"> </a></td>							

							<td align="center"><a href="javascript: editarDat1('.$registro2['coddt'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarDat1('.$registro2['coddt'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['coddt'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>