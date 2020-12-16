<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idx= $_POST['idx'];
$prepax = $_POST['prepa'];
$cgrux = $_POST['cgru'];
$pprex = $_POST['ppre'];
$ingrex = $_POST['ingre'];
$csucx = $_POST['csuc'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO menuu (detmenu,precio,codgru,blkme,ingredientes,codsuc)VALUES ('$prepax','$pprex','$cgrux','NO','$ingrex','$csucx')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE menuu SET detmenu ='$prepax',precio='$pprex',codgru='$cgrux',ingredientes='$ingrex',codsuc='$csucx' WHERE codme = '$idx'");

	break;
}


?>