<?php
include('conexion.php');

$id = $_POST['id'];
$fecha = date('Y-m-d');
//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM fgasto WHERE codga = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM fgasto WHERE fechaga='$fecha'");
//$registro = mysqli_query($conexion,"SELECT * FROM grupoc ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
<tr>
	  <td width="15%">Detalle</td>
	  <td width="9%" align="center">Fecha</td>
	  <td width="10%" align="center">Importe</td>
	  <td width="10%" align="center">Opciones</td>

  </tr>';
  $tt=0;
	while($registro2 = mysqli_fetch_array($registro)){
        $fech= date("d-m-Y", strtotime($registro2['fechaga']) );
		$tt+=$registro2['importega'];

		echo '<tr>
        <td>'.$registro2['descripga'].'</td>
        <td align="center">'.$fech.'</td>
        <td align="right">'.$registro2['importega'].'</td>
        <td align="center"><a href="javascript:eliminarGas('.$registro2['codga'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
           </td>
      </tr>';
    }
    
    echo'<tr><td colspan="2" align="center">Totales...</td><td align="right">'.number_format($tt,2).'</td></tr>';     
echo '</table>';
?>