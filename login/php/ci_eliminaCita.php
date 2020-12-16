<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM citas WHERE codcit = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM citas ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			        <tr>
			                <td width="9%" align="center">Registrado</td>
			                <td width="9%" align="center">Fecha Sugerida</td>
			                <td width="9%" align="center">Hora Sugerida</td>
			                <td width="25%" align="center">Nombre</td>
			                <td width="15%" align="center">Celular/Telf.</td>
			                <td width="15%" align="center">Correo</td>
			                <td width="20%" align="center">Observacion</td>

							<td width="9%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fecharecep']) );
		$fe2= date("d-m-Y", strtotime($registro2['fechacita']) );

		echo '<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center">'.$fe2.'</td>
							<td align="center">'.$registro2['horacita'].'</td>
							<td align="left">'.$registro2['nombrecita'].'</td>
							<td align="center">'.$registro2['celularcita'].'</td>
							<td align="left">'.$registro2['emailcita'].'</td>
							<td align="left">'.$registro2['observcita'].'</td>
							<td align="center"> <a href="javascript:eliminarCita('.$registro2['codcit'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>