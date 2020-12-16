<?php
session_start();
	$codh=$_SESSION['codh'];
	$codmov=$_SESSION['codmov'];
	$nturno=$_SESSION['nturno'];


if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Productoreg2.php';

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
				//$codthh = $_POST['codthh'];
				
				
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
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$hora=date("H:i:s");
		if (count($_SESSION['detalle'])>0) {
			try {
				$objProducto->GuardarCuentaTotal($codh, $codmov, $nturno); //una sola linea
				$objProducto->Guardarmovim($codh, $codmov, $nturno);  //una sola linea

			//	$objProducto->guardarcliente();
			//	$registro_ultima_venta = $objProducto->getUltimaVenta();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $detalle):
					$idcodh = $detalle['id'];
					$cliente = $detalle['cliente'];
					$ci = $detalle['ci'];
					$pais = $detalle['pais'];
					$precio = $detalle['precio'];
					$tipop = $detalle['tipop'];
					$codthh = $detalle['codthh'];
					$nacio = $detalle['nacio'];
					$profesion = $detalle['profesion'];
					$adultos = $detalle['adultos'];
					$ninos = $detalle['ninos'];
					$bebes = $detalle['bebes'];
					$sexo = $detalle['sexo'];
					$procede = $detalle['procede'];
					$edad = $detalle['edad'];

					
		$objProducto->RegMovim2($codh, $codmov, $nturno, $cliente, $ci, $pais,$nacio,$profesion,$adultos,$ninos,$bebes,$sexo,$procede,$edad,$hora);
					//$ttotal=$ttotal+$subtotal;
				endforeach;
				$objProducto->ActualizaHabita($idcodh,$codmov);
				$objProducto->ActualizaCodnu();
				$objProducto->ActualizaMovim($codmov,$precio,$tipop,$codthh);
				$objProducto->ActualizaCuentaTotal($codmov,$precio,$tipop);

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
		$json['msj'] = 'Cliente Agregado..';
		$json['success'] = true;
	
		if (isset($_POST['id_codh'])) {
			try {
				$nro = $_POST['nro'];
				$id_codh = $_POST['id_codh'];
				$ci = $_POST['ci'];
				$pais = $_POST['pais'];
				$procede = $_POST['procede'];
				$edad = $_POST['edad'];
				$cliente=$_POST['cliente'];
				$precio=$_POST['precio'];
				$tipop=$_POST['tipop'];
				$sexo=$_POST['sexo'];
				$nacio=$_POST['nacio'];
				$profesion=$_POST['profesion'];
				$adultos=$_POST['adultos'];
				$ninos=$_POST['ninos'];
				$bebes=$_POST['bebes'];
				$codthh=$_POST['codthh'];

			//	$resultado_producto = $objProducto->getById($servicio_id);
			//	$producto = $resultado_producto->fetchObject();
			//	$descripcion = $producto->descripser;
			//	$precio = $producto->precio;
			//	$id_prov = $producto->umed;
			//	$precio_dist = $producto->observser;
				
				
			//	$subtotal = $cantidad * $precio;
				
$_SESSION['detalle'][$nro] = array('nro'=>$nro, 'id'=>$id_codh, 'cliente'=>$cliente, 'ci'=>$ci, 'pais'=>$pais, 'procede'=>$procede,'edad'=>$edad,'precio'=>$precio,'tipop'=>$tipop,'sexo'=>$sexo,'codthh'=>$codthh,'nacio'=>$nacio,'profesion'=>$profesion,'adultos'=>$adultos,'ninos'=>$ninos,'bebes'=>$bebes);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un CLIENTE ??';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

}
?>