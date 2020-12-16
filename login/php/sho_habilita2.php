<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];

include('conexion.php');

$id = $_POST['id']; //nro
$nro = $id; //nro

$reg = mysqli_query($conexion,"SELECT * FROM menuu WHERE codme='$id' ");

	while($registro2 = mysqli_fetch_array($reg)){
		$op=$registro2['blkme'];
	}

	$va='';
	if($op=='SI'){
		$va='NO';
	}else{
		$va='SI';
	}

mysqli_query($conexion,"UPDATE menuu SET blkme='$va' WHERE codme = '$id'");


	$registro = mysqli_query($conexion,"SELECT * FROM menuu AS me LEFT JOIN grupos AS g ON me.codgru=g.codgru LEFT JOIN sucursal AS su ON me.codsuc=su.codsuc  ");


  	echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Productos</td>
			                <td width="10%" align="center">Categorias</td>
			                <td width="9%" align="center">Precio</td>
			                <td width="30%" align="center">Detalles</td>
			                <td width="12%" align="center">Sucursal</td>
							<td width="5%" align="center">Habilit.</td>
			                <td width="5%" align="center">Imagen</td>
							<td width="10%" align="center">Opciones</td>

			            </tr>';

				
	while($registro2 = mysqli_fetch_array($registro)){
				$foti=$registro2['fotome'];
		//$foti2=substr($foti,3,40);
		$foti3='../../'.$foti;

//		$fe1= date("d-m-Y", strtotime($registro2['fechareg']) );
//		$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		

		
		echo '<tr>
<td><a href="javascript:editarProp1('.$registro2['codme'].');" >'.$registro2['detmenu'].'</a></td>									<td>'.$registro2['detgrupo'].'</td>
							<td align="center">'.$registro2['precio'].'</td>
							<td>'.$registro2['ingredientes'].'</td>
							<td>'.$registro2['detsucursal'].'</td>
							
<td align="center"><a href="javascript:habilitareg('.$registro2['codme'].');" >'.$registro2['blkme'].'</a></td>							
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codme'].');" ><img src="'.$foti3.'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript:eliminarProp1('.$registro2['codme'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['codme'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							 </td>
						  </tr>';		
	}
        

    echo '</table>';



?>