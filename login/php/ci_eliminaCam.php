<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM cambalache WHERE codcam = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM cambalache AS ca LEFT JOIN departamento AS dp ON ca.coddep=dp.coddep LEFT JOIN provincia AS pv ON ca.codprov=pv.codprov LEFT JOIN propietariocam AS pc ON ca.coddue=pc.coddue ORDER BY ca.codcam DESC ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="<table class="table table-striped table-condensed table-hover table-bordered titi">
			        <tr>
			                <td width="6%" align="center">Registro</td>
			                <td width="6%" align="center">Vence</td>
							
			                <td width="15%" align="center">Detalle</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="5%" align="center">Moneda</td>
							
			                <td width="10%" align="center">Zona</td>
			                <td width="10%" align="center">Departamento</td>
			                <td width="10%" align="center">Provincia</td>
			                <td width="15%" align="center">Solicitante</td>
							
			                <td width="3%" align="center">No Consul</td>

			                <td width="5%" align="center">Imagen</td>

							<td width="15%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
				$fe1= date("d-m-Y", strtotime($registro2['fechacam']) );
				$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		

		echo '<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center"> '.$fe2.'</td>
							
<td><a href="javascript:editarProp1('.$registro2['codcam'].');" >'.$registro2['detcambala'].'</a></td>								<td align="right">'.$registro2['precioca'].'</td>
							<td align="center">'.$registro2['tmoneda'].'</td>						
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							<td>'.$registro2['descripprovi'].'</td>
							<td>'.$registro2['nombredue'].'</td>
							
							<td align="center">'.$registro2['nconsul'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codcam'].');" ><img src="'.$registro2['fotoca1'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript:eliminarProp1('.$registro2['codcam'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['codcam'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							 <a href="javascript: masfotos('.$registro2['codcam'].');" ><img src="../recursos/img-mas.png" data-toggle="tooltip" title="Mas Imagenes"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>