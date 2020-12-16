<?php
include('conexion.php');

$id = $_POST['id'];



$valores = mysqli_query($conexion,"SELECT * FROM grupos WHERE codgru = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detgrupo'], 
				);
echo json_encode($datos);
?>