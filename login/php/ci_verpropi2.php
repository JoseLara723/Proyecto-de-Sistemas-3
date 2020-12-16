<?php
include('conexion.php');

$id = $_POST['id'];


?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM cambalache AS ca LEFT JOIN provincia AS pv ON ca.codprov=pv.codprov LEFT JOIN clasecam AS cl ON ca.codclac=cl.codclac  WHERE ca.codcam=$id");

while($f=mysqli_fetch_array($re)){ 
			$moneda=$f['tmoneda'];
		$foti=$f['fotoca2'];
		$foti2=substr($foti,3,40);
		$foti3='login/'.$foti2;

		$foti1=$f['fotoca3'];
		$foti22=substr($foti1,3,40);
		$foti33='login/'.$foti22;
	
	
	?>
	

<tr><td width="100%" >Zona:<?php echo $f['zona']; ?></td></tr>
<tr><td width="100%" >Provincia :<?php echo $f['descripprovi']; ?></td></tr>
<tr><td width="100%" >Clase :<?php echo $f['detclacam']; ?></td></tr>

<tr><td width="100%"><?php	echo '<img src="'.$foti3.'" width="300" heigth="300"/>';?></td></tr>
<tr><td width="100%"><?php	echo '<img src="'.$foti33.'" width="300" heigth="300"/>';?></td></tr>
	
<?php } ?>
</table>
