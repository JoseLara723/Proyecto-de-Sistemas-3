<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM propiedades WHERE codpropi = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM datos1 ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			        <tr>
			                <td width="25%" align="center">Detalle</td>
			                <td width="10%" align="center">Zona</td>
			                <td width="20%" align="center">Direccion</td>
			                <td width="9%" align="center">Precio</td>
			                <td width="3%" align="center">Habilit.</td>
			                <td width="6%" align="center">Destacado</td>
			                <td width="6%" align="center">No Visitas</td>
			                <td width="6%" align="center">No Consultas</td>

			                <td width="5%" align="center">Imagen</td>

							<td width="9%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descrippro'].'</td>
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="center">'.$registro2['blkpro'].'</td>
							<td align="center">'.$registro2['destaca'].'</td>
							<td align="center">'.$registro2['nvisitas'].'</td>
							<td align="center">'.$registro2['nconsulta'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codpropi'].');" ><img src="'.$registro2['fotoprop'].'" width="30" height="30"> </a></td>							

							<td align="center"><a href="javascript: editarProp1('.$registro2['codpropi'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarProp1('.$registro2['codpropi'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['codpropi'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>