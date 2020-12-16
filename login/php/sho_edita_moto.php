<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM personalmoto WHERE coden = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['placa'], 
				1 => $valores2['id_per'],
				2 => $valores2['nentregas'], 
				3 => $valores2['asignado'], 

);
echo json_encode($datos);
?>