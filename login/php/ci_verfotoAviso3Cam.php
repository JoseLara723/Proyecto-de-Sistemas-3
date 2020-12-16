<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//$registro=mysql_query("SELECT * FROM productos WHERE id_prod=$id");

?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM cambalache WHERE codcam=$id");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="100" >Titulo de Aviso :<?php echo $f['detcambala']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$f['fotoca3'].'" width="300" heigth="300"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

