<?php
include('conexion.php');

$id = $_POST['id'];


?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM propiedades AS pr LEFT JOIN provincia AS pv ON pr.codprov=pv.codprov LEFT JOIN barrio AS ba ON pr.codba=ba.codba WHERE pr.codpropi=$id");

while($f=mysqli_fetch_array($re)){ 
			$moneda=$f['tmoneda'];
		$foti=$f['fotoprop2'];
		$foti2=substr($foti,3,40);
		$foti3='login/'.$foti2;

		$foti1=$f['fotoprop3'];
		$foti22=substr($foti1,3,40);
		$foti33='login/'.$foti22;
	
	
	?>
	

<tr><td width="100%" >Zona:<?php echo $f['zona']; ?></td></tr>
<tr><td width="100%" >Provincia :<?php echo $f['descripprovi']; ?></td></tr>
<tr><td width="100%" >Barrio :<?php echo $f['descripbarrio']; ?></td></tr>
<tr><td width="100%" >Area m2 :<?php echo $f['areatot']; ?></td></tr>
<tr><td width="100%" >Construido m2 :<?php echo $f['areaconstru']; ?></td></tr>

<tr><td width="100%"><?php	echo '<img src="'.$foti3.'" width="300" heigth="300"/>';?></td></tr>
<tr><td width="100%"><?php	echo '<img src="'.$foti33.'" width="300" heigth="300"/>';?></td></tr>
	
<?php } ?>
</table>
