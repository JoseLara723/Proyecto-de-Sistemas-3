<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM sucursal WHERE codsuc = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detsucursal'], 
				);
echo json_encode($datos);
?>