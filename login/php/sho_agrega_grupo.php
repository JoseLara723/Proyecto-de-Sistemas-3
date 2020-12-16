<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$dgru = $_POST['dgru'];

//var_dump ($_POST);

$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO grupos (detgrupo)VALUES ('$dgru')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE grupos SET detgrupo='$dgru'  WHERE codgru = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
echo '';
?>