<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Productoreg.php';

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
				
				$resultado_producto = $objProducto->getById($servicio_id);
				$producto = $resultado_producto->fetchObject();
				$descripcion = $producto->descripser;
				$precio = $producto->precio;
				$id_prov = $producto->umed;
				$precio_dist = $producto->observser;
				
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$servicio_id] = array('id'=>$servicio_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal,'precio_dist'=>$precio,'id_prov'=>$id_prov);

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
				unset($_SESSION['detalle'][$_POST['id']]);
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
				$objProducto->guardarVenta();
				$registro_ultima_venta = $objProducto->getUltimaVenta();
				$result_ultima_venta = $registro_ultima_venta->fetchObject();
				$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $detalle):
					$idproducto = $detalle['id'];
					$cantidad = $detalle['cantidad'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$precio_dist = $detalle['precio_dist'];
					$id_prov = $detalle['id_prov'];
					
					$ttotal=$ttotal+$subtotal;
					$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal,$precio_dist,$id_prov);
					$objProducto->incrementa_saldo($cantidad,$idproducto);
				endforeach;

				$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay productos agregados';
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
		
	case 5:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Cliente Agregado';
		$json['success'] = true;
	
		if (isset($_POST['id_codh'])) {
			try {
				$id_codh = $_POST['id_codh'];
				$ci = $_POST['ci'];
				$pais = $_POST['pais'];
				$procede = $_POST['procede'];
				$edad = $_POST['edad'];
				$cliente=$_POST['cliente'];
			//	$resultado_producto = $objProducto->getById($servicio_id);
			//	$producto = $resultado_producto->fetchObject();
			//	$descripcion = $producto->descripser;
			//	$precio = $producto->precio;
			//	$id_prov = $producto->umed;
			//	$precio_dist = $producto->observser;
				
				
			//	$subtotal = $cantidad * $precio;
				
$_SESSION['detalle'][$id_codh] = array('id'=>$id_codh, 'cliente'=>$cliente, 'ci'=>$ci, 'pais'=>$pais, 'procede'=>$procede,'edad'=>$edad);

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

}
?>