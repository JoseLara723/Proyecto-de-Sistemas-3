<?php
if (!isset($_SESSION)) {session_start();}

require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

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

	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				//$dcto = $_POST['dcto'];  // viene si / no
				//$fac = $_POST['fac']; // viene si / no
					
				
				
				$resultado_producto = $objProducto->getByIdCarta($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripc;
				$precio = $dservicio->precio;
				$saldo = $dservicio->saldo;
				$tipo = $dservicio->tipo;
				$codg = $dservicio->codti;
				$umed = $dservicio->umed;
				$foto = $dservicio->fotoc;
				$observ = $dservicio->observ;
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$saldo,'codg'=>$codg,'tipo'=>$tipo,'foto'=>$foto,'observ'=>$observ);

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
		
	case 11:
		$objProducto = new Producto1();
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
				$codg = $dservicio->codprov;
				$codigo = $dservicio->codigo;
				$foto = $dservicio->foto;
				$gru = $dservicio->grupo;
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
	
		$objProducto = new Producto1();
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
					$objProducto->GuardarCotizacion($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg,$grupo);
					$objProducto->ActualizarArticulo($idservicio, $cantidad);

				endforeach;
				$objProducto->Actualizarcodnu($nnota);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
	$objProducto->guardarTotCot($observ,$ttotal,$nnota,$idusu,$grupo);
				
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

	case 33:
require('../php/codigo_control.class.php');

	
		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$nitcli=$_POST['nitcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$nit=$_POST['nit']; // recoge datos de ajax JSON
		$nfact=$_POST['nfac']; // recoge datos de ajax JSON
		$nautoriza=$_POST['nautoriza']; // recoge datos de ajax JSON
		$felim=$_POST['felim']; // recoge datos de ajax JSON
		$llave2=$_POST['llave']; // recoge datos de ajax JSON
		$fac=$_POST['fac'];	// envia si o no 	
		$leyen=$_POST['leyen'];	// envia si o no 	

//$observ="";
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

$fecha2= date("Y-m-d", strtotime($fechav) );
$fechal= date("Y-m-d", strtotime($felim) );
$fechaqr= date("d-m-Y", strtotime($fechav) );
				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codg'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
					$tipo = $datos['tipo'];



					$ttotal=$ttotal+$subtotal;
if ($fac=='SI'){	
			$objProducto->GuardarCarta($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$foto,$codg,$umed,$observ1,$fecha2,$nfact);
}else{
			$objProducto->GuardarCartaa($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$foto,$codg,$umed,$observ1,$fecha2,$nfact);
	
}

			
			$objProducto->ActualizarArticuloVenta($idservicio, $cantidad);

				endforeach;
			//$objProducto->Actualizarcodnu($nnota);
//$_SESSION['detalle'] = array();
//unset($_SESSION['detalle']);
	
if ($fac=='SI'){	
//$fechal= date("Y-m-d", strtotime($felim) );
//$fecha2= date("Y-m-d", strtotime($fechav) );
//$fecha3=str_replace('/', '', $fecha2);
$fecha3=str_replace('-', '', $fecha2);
//$fecha33= date("d-m-Y", strtotime($fecha3) );
//str_replace('/','',$fecha)
$CodigoControl = new CodigoControl($nautoriza,$nfact,$nit,$fecha3,round(str_replace(',', '.', $ttotal), 0),$llave2);

$generado=$CodigoControl->generar();	


////////////////////// generando codigo qr

    include "../phpqrcode/qrlib.php";      
$ma=$generado;
//QRcode::png($ma);
//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = $ma;//codigocontrol;//nombre del archivo

//$codeContents = $ma.'|'.$nit.'|'.$nfact.'|'.$nautoriza.'|'.$fecha.'|'.$alumno.'|'.$nitcli.'|'.$importet;// contenido del codigo de control
$codeContents = $nit.'|'.$nfact.'|'.$nautoriza.'|'.$fechaqr.'|'.$ttotal.'|'.$ttotal.'|'.$ma.'|'.$nitcli;// contenido del codigo de control

//$fileName = 'qrcode_name.png';
$fileName = '.png';
$filename2 = '../Controller/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
//$url = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 

$objProducto->guardarTotCot2($nomcli,$ttotal,$nnota,$idusu,$generado,$filename2,$nit,$nitcli,$nautoriza,$felim,$fecha2,$nfact,$leyen);
$objProducto->ActualizarFac($nfact);

}else{ /// fac si o no

$objProducto->guardarTotCot3($nomcli,$ttotal,$nnota,$idusu,$fecha2);
$objProducto->Actualizarcodnu($nnota);
	
} // fac si o no
	
	
				
				$_SESSION['detalle'] = array();
				//session_destroy();
						
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

	case 6:
	
		$objProducto = new Producto1();
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

	case 5:
		$objProducto = new Producto1();
		$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$norden=$_POST['norden']; // recoge datos de ajax JSON

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
					$mr= $detalle['mr'];
					$cantidad = $detalle['cantidad'];
					$tpago= $detalle['tipop'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$detalle = $detalle['producto'];
					$observ= $detalle['observ'];
					

					$ttotal=$ttotal+$subtotal;
$objProducto->GuardarMovservi($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$idusu,$norden);
$objProducto->GuardarCtaTotal($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$mr,$norden,$idusu);

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
			$json['msj'] = 'No hay servicios agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;





}
?>