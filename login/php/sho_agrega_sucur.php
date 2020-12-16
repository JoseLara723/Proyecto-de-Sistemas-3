<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$dsu = $_POST['dsucu'];

//var_dump ($_POST);

$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO sucursal (detsucursal)VALUES ('$dsu')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE sucursal SET detsucursal='$dsu'  WHERE codsuc = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
echo '';
?>