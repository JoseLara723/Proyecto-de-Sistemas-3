<?php
if (!isset($_SESSION)) {session_start();}
//$codmovv=$_SESSION['codmov'];
//$codh=$_SESSION['codh'];
//$nturno=$_SESSION['nturno'];
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Productogasto.php';

switch($page){

	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		//$mr='1';
		if (isset($_POST['descripcion']) && $_POST['descripcion']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$descripcion=$_POST['descripcion'];
				$cantidad =$_POST['cantidad'];
				$precio=$_POST['precio'];
				$umed=$_POST['umed'];

		//		$producto_id = $_POST['producto_id'];
		//		$servicio_id = $_POST['servicio_id'];
		//		$tipop = $_POST['tipop'];
		//		$resultado_producto = $objProducto->getById($servicio_id);
		//		$dservicio = $resultado_producto->fetchObject();
		//		$descripcion = $dservicio->descripvit;
		//		$precio = $dservicio->precio;
		//		$umed = $dservicio->umed;
		//		$observ = $dservicio->observvit;
				
				
				$subtotal = $cantidad * $precio;

				
$_SESSION['gastos'][$descripcion] = array('id'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal,'umed'=>$umed);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['gastos'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$objProducto = new Producto1();
		$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$norden=$_POST['norden']; // recoge datos de ajax JSON

		
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['gastos'])>0) {
			try {
			//	$objProducto->guardarVenta();
			//	$registro_ultima_venta = $objProducto->getUltimaVenta();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['gastos'] as $detalle):
					$idservicio = $detalle['id'];
					$umed = $detalle['umed'];
//					$mr= $detalle['mr'];
					$cantidad = $detalle['cantidad'];
	//				$tpago= $detalle['tipop'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
		//			$detalle = $detalle['producto'];
			//		$observ= $detalle['observ'];
					

					$ttotal=$ttotal+$subtotal;
$objProducto->GuardarGastos($idservicio, $cantidad, $precio, $subtotal, $encargado, $nnota, $umed,$norden);
$objProducto->GuardarCtaTotal($idservicio, $cantidad, $precio, $subtotal, $encargado, $nnota, $umed,$norden);

				//	$objProducto->GuardarMovservi1($idservico);
					
				//	$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal,$precio_dist,$id_prov);
				//	$objProducto->incrementa_saldo($cantidad,$idproducto);
				endforeach;
				$objProducto->Actualizarcodnu($norden);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay Productos agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 4:
		//$objProducto = new Producto1();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Nota Eliminada correctamente';
		$json['success'] = true;
				
				$_SESSION['gastos'] = array();
				$json['success'] = true;
				echo json_encode($json);
	
		break;


}
?>