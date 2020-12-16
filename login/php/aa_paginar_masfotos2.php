<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM propiedades WHERE codpropi = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM cambalache  WHERE codcam='$id' ORDER BY codcam DESC ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="6%" align="center">Registro</td>
			                <td width="20%" align="center">Detalle</td>
			                <td width="10%" align="center">Zona</td>
			                <td width="3%" align="center">No Consul</td>

			                <td width="5%" align="center">Imagen-2</td>
							<td width="9%" align="center">Opcion</td>
			                <td width="5%" align="center">Imagen-3</td>
							<td width="9%" align="center">Opcion</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechacam']) );
		//$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );

		echo '<tr>
							<td>'.$fe1.'</td>
							<td>'.$registro2['detcambala'].'</td>
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['nconsul'].'</td>

							<td align="center"><a href="javascript:mostrarfoto2('.$registro2['codcam'].');" ><img src="'.$registro2['fotoca2'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript: mostrarfotocarga2('.$registro2['codcam'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen 2"></a>
							</td>
							   
							 <td align="center"><a href="javascript:mostrarfoto3('.$registro2['codcam'].');" ><img src="'.$registro2['fotoca3'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript: mostrarfotocarga3('.$registro2['codcam'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen 3"></a>
							</td>							   
							   
						  </tr>';
	}
echo '</table>';
echo '<a href="ci_AdmAvisosCam.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a>'.'  ';
?>