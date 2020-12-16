<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];

include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM movimtot WHERE norden = '$id'");
mysqli_query($conexion,"DELETE FROM movimdet WHERE norden = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE codsuc='$codsucx' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%" align="center">Fecha</td>
			                <td width="4%" align="center">No Orden</td>
			                <td width="10%" align="center">Cliente</td>
			                <td width="15%" align="center">Direccion</td>
			                <td width="10%" align="center">Celular</td>
			                <td width="3%" align="center">Items</td>
			                <td width="5%" align="center">Importe</td>
			                <td width="7%" align="center">Estado</td>
							<td width="10%" align="center">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
				$fe1= date("d-m-Y", strtotime($registro2['fechato']) );

		echo '<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td>'.$registro2['clientenom'].'</td>
							<td>'.$registro2['direccionmv'].'</td>
							<td>'.$registro2['celmv'].'</td>
							<td align="center">'.$registro2['items'].'</td>
							<td align="right">'.$registro2['importetot'].'</td>
							<td align="center">'.$registro2['estado'].'</td>

							<td align="center"> <a href="javascript:eliminarProp1('.$registro2['norden'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Pedido"></a> <a href="javascript:VerPedido('.$registro2['norden'].');" ><img src="../recursos/buscar1.png" data-toggle="tooltip" title="Ver Pedido"></a> <a href="javascript:eliminarProp1('.$registro2['norden'].');" ><img src="../recursos/impresora2.png" data-toggle="tooltip" title="Imprimir Nota"></a> <a href="javascript:eliminarProp1('.$registro2['norden'].');" ><img src="../recursos/moto1.png" data-toggle="tooltip" title="Asignar Entrega"></a></td>
						  </tr>';
	}
echo '</table>';
?>