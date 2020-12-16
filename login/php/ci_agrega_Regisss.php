<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
//$id_usux=$_SESSION['id_usu'];
date_default_timezone_set('America/La_Paz');
include('../php/conexion.php');
$proceso= $_POST['pro'];

$nomm= $_POST['nomm'];
$ncel = $_POST['ncel'];
$dire = $_POST['dire'];
$refe = $_POST['refe'];
$tipp = $_POST['tipp'];

$codigo = date('Y-m-d').date('H-i-s');
$fecha = date('Y-m-d');

$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX
$horax=substr($fefor,11,8);

$reg = mysqli_query($conexion,"SELECT * FROM codnu ");
	while($rex = mysqli_fetch_array($reg)){
		$norden=$rex['norden'];
		$norden+=1;
}


$tott;
$it=0;
if(count($_SESSION['detalle'])>0){
   	foreach($_SESSION['detalle'] as $det){ 
			$sbtotal = $det['cant']*$det['precio'];
			$tott += $sbtotal;
			$it+=1;	
			$cantx = $det['cant'];
			$preciox = $det['precio'];
			$prod = $det['producto'];
			$fotmx = $det['fotom'];
			$codmex= $det['id'];
			$codsucx= $det['codsucc'];

		mysqli_query($conexion,"INSERT INTO movimdet (fechadt,norden,detmenu,cant,preciodt,subtot,codme,codsuc)VALUES ('$fecha','$norden','$prod','$cantx','$preciox','$sbtotal','$codmex','$codsucx')");

	}
	
		mysqli_query($conexion,"INSERT INTO movimtot (fechato,clientenom,importetot,items,norden,estado,codigo,direccionmv,celmv,refermv,codsuc)VALUES ('$fecha','$nomm','$tott','$it','$norden','Pendiente','$codigo','$dire','$ncel','$tipp','$codsucx')");


		 mysqli_query($conexion,"UPDATE codnu SET norden = '$norden'");
	
		$_SESSION['detalle'] = array();

}else{
 echo "No existen Registros..";
}
	

//var_dump ($_POST);

echo " ";
?>