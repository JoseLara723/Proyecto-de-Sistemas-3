<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM propiedades AS pr LEFT JOIN provincia AS pv ON pr.codprov=pv.codprov LEFT JOIN barrio AS ba ON pr.codba=ba.codba WHERE pr.codpropi = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['descrippro'], 
				1 => $valores2['descripprovi'], 
				2 => $valores2['descripbarrio'], 
				3 => $valores2['fotoprop'], 


);
echo json_encode($datos);
?>