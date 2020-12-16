<?php
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$pla = $_POST['pla'];
$idper = $_POST['iidper'];
$csucx = $_POST['csuc'];

//var_dump ($_POST);



$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO personalmoto (placa,id_per,asignado,codsuc)VALUES('$pla','$idper','NO','$csucx')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE personalmoto SET placa='$pla'  WHERE coden = '$id'");

	break;
}


echo '';
?>