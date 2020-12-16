<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM menuu WHERE codme = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detmenu'], 
				1 => $valores2['dcto'], 
				2 => $valores2['precio'], 
				3 => $valores2['blkme'], 
				4 => $valores2['ingredientes'], 
				5 => $valores2['cddia'], 
				6 => $valores2['codgru'], 
				7 => $valores2['oferta'], 
				8 => $valores2['codsuc'], 

				);
echo json_encode($datos);
?>