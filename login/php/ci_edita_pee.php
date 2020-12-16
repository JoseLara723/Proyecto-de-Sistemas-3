<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM personal WHERE id_per = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombreper'], 
				1 => $valores2['direccper'],
				2 => $valores2['celper'], 
				3 => $valores2['emailper'],
				4 => $valores2['ciper'],
				5 => $valores2['observper'],
				6 => $valores2['fotoper'],
				7 => $valores2['codsuc'],

				);
echo json_encode($datos);
?>