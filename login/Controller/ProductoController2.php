<?php
if (!isset($_SESSION)) {session_start();}

require_once '../Config/conexion.php';
require_once '../Model/Producto2.php';

//$codmovv=$_SESSION['codmov'];
//$codh=$_SESSION['codh'];
//$nturno=$_SESSION['nturno'];
//$idusu=$_SESSION['id_usu'];

if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}


switch($page){

	case 1: /// USADO EN VENTAS APLIQUES
		$objProducto = new Producto2();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
			//	$dcto = $_POST['dcto'];  // viene si / no
			//	$fac = $_POST['fac']; // viene si / no
					
	//data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa},

				
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->ppvp;
				$precion = $dservicio->pneto;
				$saldo = $dservicio->saldo;
				$codg = $dservicio->codg;
				$codigo = $dservicio->codigo;
				$foto = $dservicio->foto;
		//		$cf = $dservicio->cf;
		//		$sf = $dservicio->sf;
				
		//		if($dcto=='SI'){
		//			if($fac=='SI'){
		//				$pventa=$pventa-($pventa*($cf/100));
		//			}else{
		//				$pventa=$pventa-($pventa*($sf/100));
		//			}
		//		}
				
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$saldo,'codg'=>$codg,'codigo'=>$codigo,'foto'=>$foto);

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

	case 11: /// USADO EN COMPRAS APLIQUES
		$objProducto = new Producto2();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
			//	$dcto = $_POST['dcto'];  // viene si / no
			//	$fac = $_POST['fac']; // viene si / no
					
	//data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa},

				
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->ppvp;
				$precion = $dservicio->pneto;
				$saldo = $dservicio->saldo;
				$codg = $dservicio->codg;
				$codigo = $dservicio->codigo;
				$foto = $dservicio->foto;
				$gru = $dservicio->grupo;
		//		$cf = $dservicio->cf;
		//		$sf = $dservicio->sf;
				
		//		if($dcto=='SI'){
		//			if($fac=='SI'){
		//				$pventa=$pventa-($pventa*($cf/100));
		//			}else{
		//				$pventa=$pventa-($pventa*($sf/100));
		//			}
		//		}
				
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$saldo,'codg'=>$codg,'codigo'=>$codigo,'foto'=>$foto,'grupo'=>$gru);

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
	
		$objProducto = new Producto2();
		$observ=$_POST['observ']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$idusu=$_POST['idusu'];												

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

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
				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codg'];
					$codigo = $datos['codigo'];
					$foto = $datos['foto'];
					$grupo = $datos['grupo'];

					$ttotal=$ttotal+$subtotal;
					$objProducto->GuardarAplique($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg,$grupo);
					$objProducto->ActualizarAplique($idservicio, $cantidad);

				endforeach;
				$objProducto->Actualizarcodnu($nnota);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
	$objProducto->guardarTotAplique($observ,$ttotal,$nnota,$idusu,$grupo);
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay articulos agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

		case 33:
	
		$objProducto = new Producto2();
		$observ=$_POST['observ']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$idusu=$_POST['idusu'];												

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

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
				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codg'];
					$codigo = $datos['codigo'];
					$foto = $datos['foto'];
					$grupo = $datos['grupo'];

					$ttotal=$ttotal+$subtotal;
					$objProducto->GuardarAplique2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg);
					$objProducto->ActualizarAplique2($idservicio, $cantidad);

				endforeach;
				$objProducto->Actualizarcodnu($nnota);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
	$objProducto->guardarTotAplique2($observ,$ttotal,$nnota,$idusu);
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay articulos agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;


	case 6:
	
		$objProducto = new Producto2();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

		$json = array();
		
		$ttotal=0.00;
		if (isset($_POST['nnota'])) {
			try {
				$json['msj'] = 'Imprimiendo';
				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No existe la nota';
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