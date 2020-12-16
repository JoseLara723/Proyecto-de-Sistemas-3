<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM usuarios WHERE id_usu = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios AS u LEFT JOIN sucursal AS su ON u.codsuc=su.codsuc ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Nombre</td>
			                <td width="10%">Usuario</td>
			                <td width="10%">Password</td>
			                <td width="10%">Acceso</td>
			                <td width="10%">Sucursal</td>

			                <td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			

	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Sup-Administrador';}
		if ($registro2['id_area']=='adm'){$tadm='Administrador';}
		if ($registro2['id_area']=='caja'){$tadm='Cajera';}
		
		echo '<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td>'.$tadm.'</td>
							<td>'.$registro2['detsucursal'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>