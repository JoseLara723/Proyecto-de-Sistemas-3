<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idar'];
$codduex = $_POST['codduex'];
$descri = $_POST['descri'];
$zon = $_POST['zon'];
$monn = $_POST['monn'];
$pre = $_POST['pre'];
$dueno = $_POST['dueno'];
$dire = $_POST['dire'];
$ci = $_POST['ci'];
$cel = $_POST['cel'];
$codep = $_POST['codep'];
$codpvi = $_POST['codpvi'];
$fergx = $_POST['ferg'];
$fvenx = $_POST['fven'];
$hax = $_POST['hax'];
//$nvis = $_POST['nvis'];
$nconsul = $_POST['nconsul'];


$fecha = date('Y-m-d');
//var_dump ($_POST);


switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO PROPIEDADES (detalle)VALUES ('$descla')");
	break;
	case 'Editar':
	
	
		
mysqli_query($conexion,"UPDATE cambalache SET blkcam ='$hax',fechavence='$fvenx',zona='$zon',precioca='$pre',coddep='$codep',codprov='$codpvi',tmoneda='$monn' WHERE codcam = '$idarx'");



		mysqli_query($conexion,"UPDATE propietariocam SET nombredue ='$dueno',celdue='$cel',direccdue='$dire',cidue='$ci' WHERE coddue = '$codduex'");



	break;
}

//	
//echo '</table>';
?>