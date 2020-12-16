<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RAOS EN cero</title>
<style type="text/css">
.caja {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #CCC;
	background-color: #FF3;
	height: 100px;
	width: 300px;
	font-weight: normal;
	padding-top: 40px;
	padding-right: 25px;
	padding-bottom: 25px;
	padding-left: 25px;
	text-decoration: none;
	display: block;
}
</style>
</head>

<body>

<?php
//$conexion = mysql_connect('localhost', 'root', 'marite');
//mysql_select_db('bbdhotel', $conexion);
include('../php/conexion.php');

$sena = $_POST['sena'];

if ($sena=='del2020'){

mysqli_query($conexion,"UPDATE codnu  SET norden='0' ");
//mysqli_query($conexion,"UPDATE vitrina  SET  saldo=0");
//mysqli_query($conexion,"UPDATE codnu  SET nturno=0, turno='C', dejo=100, codmov=0, norden=0, nticket=0,ncompro=0,cdi=0,cde=0,cdt=0,nbalance=0 ");


mysqli_query($conexion,"TRUNCATE TABLE caja");
mysqli_query($conexion,"TRUNCATE TABLE fgasto");
mysqli_query($conexion,"TRUNCATE TABLE movimtot");
mysqli_query($conexion,"TRUNCATE TABLE movimdet");
mysqli_query($conexion,"TRUNCATE TABLE personalmoto");

mysqli_query($conexion,"DELETE FROM usuarios WHERE id_area != 'admin'");
mysqli_query($conexion,"DELETE FROM personal WHERE id_per != '1'");


//echo "PROCESO CONCLUIDO......";
?>
<br>
<br>
<div class="caja">
<a href="a_principal.php">SE COLOCO EN CERO TODOS LOS DATOS... RETORNAR AL MENU PRINCIPAL .......</a>
</div>
<?php
}else{
?>
<div class="caja">
<a href="a_frontis.php">PASSWORD INCORRECTO... RETORNAR AL MENU PRINCIPAL .......</a>
</div>

<?php	
	}
?>


</body>
</html>
