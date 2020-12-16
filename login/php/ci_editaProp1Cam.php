<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM cambalache AS ca LEFT JOIN departamento AS dp ON ca.coddep=dp.coddep LEFT JOIN provincia AS pv ON ca.codprov=pv.codprov LEFT JOIN propietariocam AS pc ON ca.coddue=pc.coddue WHERE ca.codcam = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detcambala'], 
				1 => $valores2['zona'], 
				2 => $valores2['direccdue'], 
				3 => $valores2['coddep'], 
				4 => $valores2['codprov'],
				5 => $valores2['coddue'], 
				6 => $valores2['nconsul'], 
				7 => $valores2['fechacam'], 
				8 => $valores2['fechavence'], 
				9 => $valores2['precioca'], 
				10 => $valores2['tmoneda'], 
				11 => $valores2['blkcam'], 
				12 => $valores2['nombredue'], 
				13 => $valores2['direccdue'], 
				14 => $valores2['cidue'], 
				15=> $valores2['celdue'], 

	
				);
echo json_encode($datos);
?>