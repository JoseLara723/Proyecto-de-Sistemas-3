<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
//$id_usux=$_SESSION['id_usu'];
date_default_timezone_set('America/La_Paz');
include('../php/conexion.php');
//$proceso= $_POST['pro'];

$descri = $_POST['descri'];
$zon = $_POST['zon'];
$codep = $_POST['codep'];
$monex = $_POST['mone'];
$prex = $_POST['pre'];
$duenox = $_POST['dueno'];
$direx = $_POST['dire'];
$cix = $_POST['ci'];
$celx = $_POST['cel'];
$coprovx = $_POST['coprov'];
$cllx = $_POST['codgg'];





$fecha = date('Y-m-d');

$date22 = time(); // formato unix 
$diass=$date22+(86400*15);
$fefor= date("Y-m-d(H:i:s)", $diass); //formateando el UNIX
//$horaaa=substr($fefor,11,8);
$feven=substr($fefor,0,10);
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

		mysqli_query($conexion,"INSERT INTO propietariocam (nombredue,celdue,direccdue,cidue)VALUES
		 ('$duenox','$celx','$direx','$cix')");

		$codduex=mysqli_insert_id($conexion); 

		mysqli_query($conexion,"INSERT INTO cambalache (detcambala,zona,coddep,nconsul,fechacam,codprov,fechavence,precioca,tmoneda,coddue,blkcam,codclac)VALUES
		 ('$descri','$zon','$codep','0','$fecha','$coprovx','$feven','$prex','$monex','$codduex','NO','$cllx')");


?>