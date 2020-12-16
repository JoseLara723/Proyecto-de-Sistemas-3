<?php
	include('../php/conexion.php');
	//include('conexion.php');
	
	$año = $_POST['año'];
	
	$enero = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=1 AND YEAR(fecha)='$año' AND tmov='I'"));
	$febrero = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=2 AND YEAR(fecha)='$año' AND tmov='I'"));
	$marzo = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=3 AND YEAR(fecha)='$año' AND tmov='I'"));
	$abril = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=4 AND YEAR(fecha)='$año' AND tmov='I'"));
	$mayo = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=5 AND YEAR(fecha)='$año' AND tmov='I'"));
	$junio = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=6 AND YEAR(fecha)='$año' AND tmov='I'"));
	$julio = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=7 AND YEAR(fecha)='$año' AND tmov='I'"));
	$agosto = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=8 AND YEAR(fecha)='$año' AND tmov='I'"));
	$septiembre = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=9 AND YEAR(fecha)='$año' AND tmov='I'"));
	$octubre = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=10 AND YEAR(fecha)='$año' AND tmov='I'"));
	$noviembre = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=11 AND YEAR(fecha)='$año' AND tmov='I'"));
	$diciembre = mysql_fetch_array(mysql_query("SELECT SUM(totalbs) AS r FROM venta WHERE MONTH(fecha)=12 AND YEAR(fecha)='$año' AND tmov='I'"));
	
	$data = array(0 => round($enero['r'],1),
				  1 => round($febrero['r'],1),
				  2 => round($marzo['r'],1),
				  3 => round($abril['r'],1),
				  4 => round($mayo['r'],1),
				  5 => round($junio['r'],1),
				  6 => round($julio['r'],1),
				  7 => round($agosto['r'],1),
				  8 => round($septiembre['r'],1),
				  9 => round($octubre['r'],1),
				  10 => round($noviembre['r'],1),
				  11 => round($diciembre['r'],1)
				  );			 
	echo json_encode($data);
?>