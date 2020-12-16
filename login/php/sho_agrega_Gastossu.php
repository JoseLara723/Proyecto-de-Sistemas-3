<?php
if (!isset($_SESSION)) {session_start();}

$id_usux=$_SESSION['id_usu'];
$codsucx=$_SESSION['codsuc'];

date_default_timezone_set('America/La_Paz');


include('../php/conexion.php');

$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$fee = $_POST['fee'];
$det = $_POST['det'];
$impo = $_POST['impo'];
$csucx = $_POST['csuc'];
//$observv = $_POST['observv'];
//$cel = $_POST['cel'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO fgasto (descripga,fechaga,importega,id_usu,codsuc)VALUES ('$det','$fee','$impo','$id_usux','$csucx')");
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE fgasto SET descripga ='$det',fechaga='$fee',importega='$impo',id_usu='$id_usux' WHERE codga = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM fgasto WHERE fechaga='$fecha' AND codsuc='$codsucx' ");


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