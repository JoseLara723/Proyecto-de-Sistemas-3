<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

date_default_timezone_set('America/La_Paz');

include('../php/conexion.php');
$proceso= $_POST['pro3'];

$idx= $_POST['idx3'];//norden
$cliex = $_POST['clie3'];
$prex = $_POST['pre3'];
$cperx = $_POST['cperm3'];
$obvx = $_POST['obv3'];

$fecha = date('Y-m-d');

$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX

//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );
echo $date22;


switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO menuu (detmenu,precio,codgru,blkme,ingredientes)VALUES ('$prepax','$pprex','$cgrux','NO','$ingrex')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE personalmoto SET asignado ='SI',norden='$idx' WHERE coden = '$cperx'");
		mysqli_query($conexion,"UPDATE movimtot SET estado ='Enviado',id_usu='$id_usux',unixi='$date22',unixf='0' WHERE norden = '$idx'");

	break;
}


?>