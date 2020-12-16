<?php
//include('conexion.php');
//if (!isset($_SESSION)) {session_start();}

include('../php/conexion.php');
$idx= $_POST['id'];


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM menuu WHERE codme='$idx' ");


echo '<table class="table table-striped table-condensed table-bordered titi">
        	<tr>
			                <td width="15%">Detalle</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['ingredientes'].'</td>

		</tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>