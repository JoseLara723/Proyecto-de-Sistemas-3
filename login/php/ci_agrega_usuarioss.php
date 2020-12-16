<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$iidper = $_POST['iidper'];
$usua = $_POST['usua'];
$pass = $_POST['pass'];
//$csuc=$_POST['csuc'];
//$desar = $_POST['desar'];
$cdp = $_POST['cdp'];
$tiu = $_POST['tiu'];
$csuc = $_POST['csuc'];

$codts=0;
$nosuc="";
$tadm="";

//var_dump ($_POST);
$busnombre = mysqli_query($conexion,"SELECT * FROM personal WHERE id_per='$iidper' ");
	while($buss = mysqli_fetch_array($busnombre)){
		$nnombre=$buss['nombreper'];
		$fotoper=$buss['fotoper'];
		$ciper=$buss['ciper'];
		
	}


$fecha = date('Y-m-d');
$xx='rolito';
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,id_per,fotousu,codsuc)VALUES
		('$usua','$nnombre','$pass','$tiu','$iidper','$fotoper','$csuc')");
		
mysqli_query($conexion,"UPDATE personal SET asignado='SI', codsuc = '$csuc'  WHERE id_per = '$iidper'");
		
		
		
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET usuario='$usua',pass_usu = '$pass',nomb_usu='$nnombre' WHERE id_usu = '$id'");

		mysqli_query($conexion,"UPDATE personal SET asignado='SI'  WHERE id_per = '$iidper'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
        	 <tr>
			                <th width="15%">Nombre</th>
			                <th width="10%">Usuario</th>
			                <th width="10%">Password</th>
			                <th width="10%" class="hidden-xs">Acceso</th>

			                <th width="15%">Opciones</th>

			            </tr>';
$tadm='';
	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='usuarios'){$tadm='Usuario';}

		echo '<<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td class="hidden-xs">'.$tadm.'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>