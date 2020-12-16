
<?php
//echo "estamos el la pAgina de subir";
$id=$_POST['idprod'];
//$coment=$_POST['coment'];
//$fechai=$_POST['fechai'];
$nombrefoto=$_FILES['file']['name'];
$tamano=$_FILES['file']['size'];
$ruta=$_FILES['file']['tmp_name'];
//$nro=$_POST(id);
//$ALEA=rand(1,10000);
$foto = date('Y-m-d').date('H-i-s').'.jpg';
//$nombrefoto = substr ($nombrefoto, 5); // devuelve 5 posiciones empezando de la derecha

//echo "<br>"."nombre de la foto...".$nombrefoto;
//echo "<br>"."ruta...."."...".$ruta."<br>";
//$destino="fotos/"."X".$nombrefoto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO
//$destino="../fotos/".$ALEA.$nombrefoto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO
$destino="../fotos/".$foto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO
//$destino2="../../fotos".$foto;



copy($ruta,$destino);
//conexion con la base de datos
include('../php/conexion.php');


mysqli_query($conexion,"UPDATE datos1 SET fotodat = '$destino' WHERE coddt = '$id'");

	echo '<Script language=javascript> 
	alert("LA IMAGEN FUE SUBIDA CORRECTAMENTE...")
	self:location="ci_formfotos.php"	
	</script>';
 ?>
