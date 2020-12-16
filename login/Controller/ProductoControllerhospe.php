<?php
session_start();
$codmovv=$_SESSION['codmov'];
$codh=$_SESSION['codh'];
$nturno=$_SESSION['nturno'];
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

switch($page){

	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
	
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$servicio_id = $_POST['servicio_id'];
				$tipop = $_POST['tipop'];
				
				$resultado_producto = $objProducto->getById($servicio_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripser;
				$precio = $dservicio->precio;
				$umed = $dservicio->umed;
				$observ = $dservicio->observser;
				
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$servicio_id] = array('id'=>$servicio_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal,'observ'=>$observ,'umed'=>$umed, 'tipop'=>$tipop);

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
	
		if (isset($_POST['fecha'])) {
			try {
				$_SESSION['hospedaje'] = array();
				//unset($_SESSION['hospedaje'][$_POST['fecha']]);
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
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarVenta();
			//	$registro_ultima_venta = $objProducto->getUltimaVenta();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $detalle):
					$idservicio = $detalle['id'];
					$umed = $detalle['umed'];
					$cantidad = $detalle['cantidad'];
					$tpago= $detalle['tipop'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$detalle = $detalle['producto'];
					$observ= $detalle['observ'];
					

					$ttotal=$ttotal+$subtotal;
$objProducto->GuardarMovservi($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago);
$objProducto->GuardarCtaTotal($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago);

				//	$objProducto->GuardarMovservi1($idservico);
					
				//	$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal,$precio_dist,$id_prov);
				//	$objProducto->incrementa_saldo($cantidad,$idproducto);
				endforeach;

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
			$json['msj'] = 'No hay servicios agregados';
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
				
				$_SESSION['detalle'] = array();
				$json['success'] = true;
				echo json_encode($json);
	
		break;


}
?>
<script src="../js/myjavacarga.js"></script>
