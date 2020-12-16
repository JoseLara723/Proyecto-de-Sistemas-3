<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];

include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
  	$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$id' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%" align="center">Preparacion</td>
			                <td width="4%" align="center">Cant.</td>
			                <td width="9%" align="center">Precio</td>
			                <td width="9%" align="center">Sub-Total</td>

			            </tr>';
$tott=0;
	while($registro2 = mysqli_fetch_array($registro)){
//				$fe1= date("d-m-Y", strtotime($registro2['fechato']) );
		$sub=$registro2['cant']*$registro2['preciodt'];
		$tott+=$sub;
		echo '<tr>
							<td>'.$registro2['detmenu'].'</td>
							<td align="center">'.$registro2['cant'].'</td>
							<td align="right">'.$registro2['preciodt'].'</td>
							<td align="right">'.$registro2['subtot'].'</td>

							</tr>';
	}
echo '<tr><td colspan="3" align="right">Totales Bs.</td><td align="right">'.number_format($tott,2).'</td></tr>';
echo '</table>';
echo '<a href="sho_aprobaru.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a>'.'  ';

?>