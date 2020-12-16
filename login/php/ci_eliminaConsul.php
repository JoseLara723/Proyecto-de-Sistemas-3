<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM solicitud WHERE codsol = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicitud AS co LEFT JOIN
	 propiedades AS pro ON co.codpropi=pro.codpropi LEFT JOIN propietario AS pr ON pro.coddue=pr.coddue");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			        <tr>
			                <td width="9%" align="center">Fecha de Solicitud</td>
			                <td width="10%" align="center">CODIGO</td>
			                <td width="15%" align="center">Solicitante</td>
			                <td width="10%" align="center">Celular</td>
			                <td width="12%" align="center">Correo</td>
			                <td width="20%" align="center">Titulo del Aviso</td>
			                <td width="12%" align="center">Propietario</td>
			                <td width="10%" align="center">Cel.Propietario</td>
			                <td width="12%" align="center">Correo Propietario</td>
			                <td width="20%" align="center">Observacion</td>

							<td width="10%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
$fe1= date("d-m-Y", strtotime($registro2['fechasol']) );
//		$fe2= date("d-m-Y", strtotime($registro2['fechacita']) );
		
		echo '<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center">'.$registro2['codigosol'].'</td>
							<td align="center">'.$registro2['nombresol'].'</td>
							<td align="center">'.$registro2['celusol'].'</td>
							<td align="center">'.$registro2['emailsol'].'</td>
							<td align="center">'.$registro2['descrippro'].'</td>
							<td align="left">'.$registro2['nombredue'].'</td>
							<td align="center">'.$registro2['celdue'].'</td>
							<td align="left">'.$registro2['emaildue'].'</td>
							<td align="left">'.$registro2['observsol'].'</td>
							<td align="center"> <a href="javascript:eliminarConsu('.$registro2['codsol'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>