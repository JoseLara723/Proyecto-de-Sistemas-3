<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['fechato'], 
				1 => $valores2['clientenom'], 
				2 => $valores2['items'], 
				3 => $valores2['estado'], 
				4 => $valores2['codigo'], 
				5 => $valores2['direccionmv'], 
				6 => $valores2['celmv'], 
				7 => $valores2['refermv'], 
				8 => $valores2['importetot'], 
	
				);
echo json_encode($datos);
?>