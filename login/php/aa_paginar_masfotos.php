<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM propiedades WHERE codpropi = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM propiedades  WHERE codpropi='$id' ORDER BY codpropi DESC ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			        <tr>
			                <td width="6%" align="center">Registro</td>
			                <td width="6%" align="center">Vence</td>
			                <td width="20%" align="center">Detalle</td>

			                <td width="5%" align="center">Imagen-2</td>
			                <td width="5%" align="center">Opcion</td>
			                <td width="5%" align="center">Imagen-3</td>
			                <td width="5%" align="center">Opcion</td>


			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechareg']) );
		$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );

		echo '<tr>
							<td>'.$fe1.'</td>
							<td>'.$fe2.'</td>
							<td>'.$registro2['descrippro'].'</td>
							<td align="center"><a href="javascript:mostrarfoto2('.$registro2['codpropi'].');" ><img src="'.$registro2['fotoprop2'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript: mostrarfotocarga2('.$registro2['codpropi'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen 2"></a>
							</td>
							   
							 <td align="center"><a href="javascript:mostrarfoto3('.$registro2['codpropi'].');" ><img src="'.$registro2['fotoprop3'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript: mostrarfotocarga3('.$registro2['codpropi'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen 3"></a>
							</td>							   
							   
						  </tr>';
	}
echo '</table>';
echo '<a href="ci_AdmAvisos.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a>'.'  ';
?>