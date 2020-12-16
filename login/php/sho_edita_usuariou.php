<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usu = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_usu'], 
				1 => $valores2['usuario'],
				2 => $valores2['pass_usu'], 
				3 => $valores2['id_area'],
				4 => $valores2['id_per'],
				5 => $valores2['codsuc'],
				6 => $valores2['fotousu'],
				7 => $valores2['coddep'],
				8 => $valores2['nombredepto'],
				9 => $valores2['codtisuc'],

				);
echo json_encode($datos);
?>