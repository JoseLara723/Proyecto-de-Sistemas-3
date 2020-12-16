<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM personal WHERE id_per = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM personal ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			        <tr>
			                <td width="15%">Nombre</td>
			                <td width="11%" >Direccion</td>
			                <td width="9%" class="hidden-xs">No Carnet</td>
			                <td width="9%" class="hidden-xs">Telf/Cel.</td>
							<td width="10%" class="hidden-xs">Email</td>
			                <td width="7%" class="hidden-xs">Observacion</td>
							<td width="5%" class="hidden-xs" align="center">Imagen</td>
							<td width="10%" align="center" >Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombreper'].'</td>
							<td class="hidden-xs">'.$registro2['direccper'].'</td>
							<td class="hidden-xs">'.$registro2['ciper'].'</td>
							<td class="hidden-xs">'.$registro2['celper'].'</td>
							<td class="hidden-xs">'.$registro2['emailper'].'</td>
							<td class="hidden-xs">'.$registro2['observper'].'</td>
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['id_per'].');" ><img src="'.$registro2['fotoper'].'" width="30" height="30"> </a></td>
							<td align="center"><a href="javascript:editarPee('.$registro2['id_per'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarPee('.$registro2['id_per'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>