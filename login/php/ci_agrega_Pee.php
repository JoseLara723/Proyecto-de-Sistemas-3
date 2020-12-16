<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$despv = $_POST['despv'];
$cii = $_POST['cii'];
$dire = $_POST['dire'];
$emma = $_POST['emma'];
$observv = $_POST['observv'];
$cel = $_POST['cel'];
$fotoar = $_POST['fotoar'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO personal (nombreper,direccper, celper, emailper, ciper,observper,asignado,codsuc)VALUES
		('$despv','$dire','$cel','$emma','$cii','$observv','NO','0')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE personal SET nombreper ='$despv',direccper='$dire',celper='$cel',emailper='$emma',ciper='$cii',
		observper='$observv' WHERE id_per = '$idarx'");

		mysqli_query($conexion,"UPDATE usuarios SET fotousu ='$fotoar' WHERE id_per = '$idarx'");
		
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM personal ");


echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td width="15%">Nombre</td>
			                <td width="11%" >Direccion</td>
			                <td width="9%" class="hidden-xs">No Carnet</td>
			                <td width="9%" class="hidden-xs">Telf/Cel.</td>
							<td width="10%" class="hidden-xs">Email</td>
			                <td width="7%" class="hidden-xs">Observacion</td>
							<td width="5%" class="hidden-xs" align="center">Imagen</td>
							<td width="10%" align="center" >Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

		echo '<tr>
							<td>'.$registro2['nombreper'].'</td>
							<td class="hidden-xs">'.$registro2['direccper'].'</td>
							<td class="hidden-xs">'.$registro2['ciper'].'</td>
							<td class="hidden-xs">'.$registro2['celper'].'</td>
							<td class="hidden-xs">'.$registro2['emailper'].'</td>
							<td class="hidden-xs">'.$registro2['observper'].'</td>
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['id_per'].');" ><img src="'.$registro2['fotoper'].'" width="30" height="30"> </a></td>
							<td align="center"><a href="javascript:editarPee('.$registro2['id_per'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarPee('.$registro2['id_per'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   </td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>