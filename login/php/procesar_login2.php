<?php
if (!isset($_SESSION)) {session_start();}



include('../php/conexion.php');
$usu = addslashes($_POST['usu']);
$pass = addslashes($_POST['pass']);
//$area = addslashes($_POST['area']);

$usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu'");
if (mysqli_num_rows($usuario)<1) {
   echo 'usuario';
} else{
	$clave = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu' AND pass_usu = '$pass'");
		if(mysqli_num_rows($clave)<1){
			echo 'password';
		}else{
			
		$consulta2 = mysqli_fetch_array($clave);
			$_SESSION['usuario'] = $consulta2['usuario'];
			$_SESSION['id_area'] = $consulta2['id_area'];
			$_SESSION['id_usu'] = $consulta2['id_usu'];
			$_SESSION['nomb_usu'] = $consulta2['nomb_usu'];
			$_SESSION['id_per'] = $consulta2['id_per'];
			$_SESSION['coddep'] = $consulta2['coddep'];
			$_SESSION['nomdepto'] = $consulta2['nombredepto'];
			$_SESSION['codsuc'] = $consulta2['codsuc'];
			$_SESSION['fotousu'] = $consulta2['fotousu'];
			$_SESSION['nomb_suc'] = $consulta2['nomb_suc'];
			$_SESSION['codtisuc'] = $consulta2['codtisuc'];
			$area=$consulta2['id_area'];
		
			echo $area;
			
		}
}


		//	$addm="adminnn";
		//	echo 'admin';
//			switch($consulta2['id_area']){
//			switch($addm){
//					
//				case 'admin':
//					echo 'admin';
//				break;
//				case 'operador':
//					echo 'operador';
//				break;
//				case 'sucursal':
//					echo 'sucursal';
//				break;
//				case 'movil':
//					echo 'movil';
//				break;
//				case 'vendedor':
//					echo 'vendedor';
//				break;
//				case 'cobrador':
//					echo 'cobrador';
//				break;
//				case 'compras':
//					echo 'compras';
//				break;
//				case 'ventas':
//					echo 'ventas';
//				break;


	//		}
	//	}
	//}
//}
?>
