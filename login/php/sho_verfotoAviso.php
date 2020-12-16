<?php
include('conexion.php');
$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM menuu WHERE codme=$id");

while($f=mysqli_fetch_array($re)){ 
	
		$foti=$f['fotome'];
		//$foti2=substr($foti,3,40);
		$foti3='../../'.$foti;
	
	
	?>
	


<tr><td width="100" >Detalle :<?php echo $f['detmenu']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$foti3.'" width="300" heigth="300"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

