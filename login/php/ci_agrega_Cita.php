<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
//$id_usux=$_SESSION['id_usu'];
date_default_timezone_set('America/La_Paz');
include('../php/conexion.php');
$proceso= $_POST['pro'];

$codx= $_POST['codx'];
$nom = $_POST['nom'];
$emma = $_POST['emma'];
$cel = $_POST['cel'];
$cod = $_POST['cod'];
$fee = $_POST['fee'];
$hora = $_POST['hora'];
$observ = $_POST['observ'];
//$cel = $_POST['cel'];
$codigo = date('Y-m-d').date('H-i-s');
$fecha = date('Y-m-d');

$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX
$horax=substr($fefor,11,8);


//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

//switch($proceso){
//	case 'Registro':
		mysqli_query($conexion,"INSERT INTO citas (fecharecep,horarecep,fechacita,horacita,celularcita,nombrecita,emailcita,observcita)VALUES
		 ('$fecha','$horax','$fee','$hora','$cel','$nom','$emma','$observ')");
		 
		 mysqli_query($conexion,"UPDATE propiedades SET nconsulta =nconsulta+1 WHERE codpropi = '$codx'");
//	break;
	
//	case 'Editar':
		
		//mysqli_query($conexion,"UPDATE datos1 SET detalle ='$descla' WHERE coddt = '$idarx'");

//	break;
//}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
//	$registro = mysqli_query($conexion,"SELECT * FROM datos1  ");
//
//
//echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
//        	  <tr>
//			                <td width="25%" align="center">Descripcion de la Imagen</td>
//			                <td width="5%" align="center">Imagen</td>
//
//							<td width="10%" align="center">Opciones</td>
//
//			            </tr>';
//	while($registro2 = mysqli_fetch_array($registro)){
////	$tt=$tt+$registro2['totalcr'];
////	$tcr=$tcr+$registro2['saldocr'];
//
//		echo '<tr>
//							<td>'.$registro2['detalle'].'</td>
//							<td align="center"><a href="javascript:mostrarfoto('.$registro2['coddt'].');" ><img src="'.$registro2['fotodat'].'" width="30" height="30"> </a></td>							
//
//							<td align="center"><a href="javascript: editarDat1('.$registro2['coddt'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
//							 <a href="javascript:eliminarDat1('.$registro2['coddt'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
//							 <a href="javascript: mostrarfotocarga('.$registro2['coddt'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
//							   </td>
//						  </tr>';
//	}
//	
////    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
//	
//echo '</table>';
?>