<?php
if (!isset($_SESSION)) {session_start();}
$codsucse=$_SESSION['codsuc'];
$idperx=$_SESSION['id_per'];
$idusuu=$_SESSION['id_usu'];


//$coddepu=$_SESSION['coddep']; //depto usuario
//$codsucu=$_SESSION['codsuc']; // codigo sucursal usuario
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
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' ) {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pneto = $_POST['pneto'];
		//		$codepto=$_POST['codepto'];
				$pnetoo=$_POST['pnetoo'];
		//		$comis=$_POST['comis'];
		//		$dcto=$_POST['dcto'];

				//$dcto = $_POST['dcto'];  // viene si / no
				//$fac = $_POST['fac']; // viene si / no
					
				
				
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripc;
				$pnetox = $dservicio->precio;
				$saldo = $dservicio->saldo;
				$umed = $dservicio->umed;
				$codigox= $dservicio->codti;
				$fotox = $dservicio->fotoc;
				$observx = $dservicio->observ;
				
				$subtotal = ($cantidad * $pneto);
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,
	'cantidad'=>$cantidad, 'precio'=>$pneto, 'subtotal'=>$subtotal,'saldo'=>$saldo,'codigo'=>$codigox,
	'foto'=>$fotox,'observ'=>$observx);

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
//require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nitv=$_POST['nitv']; // recoge datos de ajax JSON
		$cosuc=$_POST['cosuc']; // recoge datos de ajax JSON
		$coclix=$_POST['coclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;

		
$nxr=0;

$buss = $objProducto->getDosificaconx($cosuc);
		foreach($buss as $nnn):
			$nxr=$nxr+1;
			$buu= $nnn['codsuc'];
			$faac= $nnn['facactual']+1;
			$nautoriza= $nnn['nautorizacion'];
			$nnit= $nnn['nit'];
			$llave= $nnn['llave'];
			$felim= $nnn['fechalim'];
			$leyenda= $nnn['leyenda'];
			$cdfac= $nnn['cdfac'];
			$coddox= $nnn['coddo'];

		endforeach;
	$codsucfa=$buu;		
		
		
$fecha2= date("Y-m-d", strtotime($fechav) );
$fechal= date("Y-m-d", strtotime($felim) );
$fechaqr= date("d-m-Y", strtotime($fechav) );
		

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0 && $nitv!=0 && $cosuc!=0) {
			
			try {

				
	
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetvv($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$cosuc);
			$objProducto->ActualizarArt($idservicio, $cantidad);

				endforeach;

//$fecha3=str_replace('-', '', $fecha2);
			//$fecha33= date("d-m-Y", strtotime($fecha3) ); NO
			//str_replace('/','',$fecha) NO
//$CodigoControl = new CodigoControl($nautoriza,$faac,$nnit,$fecha3,round(str_replace(',', '.', $ttotal), 0),$llave);
//$generado=$CodigoControl->generar();	
			////////////////////// generando codigo qr NO

//include "../phpqrcode/qrlib.php";      
//$ma=$generado;
			//QRcode::png($ma); NO
			//$tempDir = EXAMPLE_TMP_SERVERPATH;  NO
//$tempDir = $ma;//codigocontrol;//nombre del archivo  NO

//$codeContents = $nnit.'|'.$faac.'|'.$nautoriza.'|'.$fechaqr.'|'.$ttotal.'|'.$ttotal.'|'.$ma.'|'.$nitv;

			//$fileName = 'qrcode_name.png'; NO
//$fileName = '.png';
//$filename2 = '../Controller/'.$ma.'.png';
//$pngAbsoluteFilePath = $tempDir.$fileName;
			//$url = EXAMPLE_TMP_URLRELPATH.$fileName;  NO

//QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 
				
				
				
				
$objProducto->Actualizarcodnu($nroing);
//$objProducto->guardarTotMvvv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$faac,$nnit,$nitv,$nautoriza,$felim,$ma,$filename2,$cosuc,$leyenda,$coddox,$coclix); /// fpg = IN,DEV,BJ
$objProducto->guardarTotMvvv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$faac,$nnit,$nitv,$nautoriza,$felim,$cosuc,$leyenda,$coddox,$coclix); /// fpg = IN,DEV,BJ

			//$nfact=$nfact+1; NO
$objProducto-> ActualizarFac($faac,$codsucfa);	

			///registrar clientes  NO
			//$tt=$objProducto-> VerificaCi($nitv); NO
			//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}	 NO		
				
//$tt=$objProducto-> VerificaNit($nitv);	
//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				

				
				$_SESSION['detalle'] = array();
				//session_destroy(); NO
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Revise NIT, o elija SUCURSAL, o la Factura no tiene Datos';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

		
	case 22:
//require('../php/codigo_control.class.php');
//require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nitv=$_POST['nitv']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

				
	
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->Guardar21($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$codsucse);
			$objProducto->ActualizarArttt($idservicio, $cantidad);

				endforeach;


				
$objProducto->Actualizarcodnu($nroing);
				
$objProducto->guardarTot21($fechavv,$nroing,$idusu,$ttotal,$respo,$itm); /// fpg = IN,DEV,BJ

				
	
				
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

	case 222:
//require('../php/codigo_control.class.php');
require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nitv=$_POST['nitv']; // recoge datos de ajax JSON
		$cosuc=$_POST['cosuc']; // recoge datos de ajax JSON
		$coddox=$_POST['coddox']; // recoge datos de ajax JSON
		$norx=$_POST['norx']; // recoge datos de ajax JSON
		$nfacbu=$_POST['nfacbu']; // recoge datos de ajax JSON
		$cclix=$_POST['cclix']; // recoge datos de ajax JSON


 $objProducto-> BorrarMovimtot($norx,$cosuc);
 $objProducto-> BorrarMovDet($norx,$cosuc);

//$nnota = $objProducto->getcodnu();
//		foreach($nnota as $nro):
			$nroing= $norx;//$nro['nordenrec']+1;
//		endforeach;

		
$nxr=0;
//$cosuc=1;
$buss = $objProducto->getDosificaconx($cosuc);
		foreach($buss as $nnn):
			$nxr=$nxr+1;
			$buu= $nnn['codsuc'];
			$faac= $nfacbu;//$nnn['facactual']+1;
			$nautoriza= $nnn['nautorizacion'];
			$nnit= $nnn['nit'];
			$llave= $nnn['llave'];
			$felim= $nnn['fechalim'];
			$leyenda= $nnn['leyenda'];
			$cdfac= $nnn['cdfac'];
			$coddox= $nnn['coddo'];

		endforeach;
	$codsucfa=$buu;		
		
		
$fecha2= date("Y-m-d", strtotime($fechav) );
$fechal= date("Y-m-d", strtotime($felim) );
$fechaqr= date("d-m-Y", strtotime($fechav) );
		

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

				
	
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetvv($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$cosuc);
			//$objProducto->ActualizarArt($idservicio, $cantidad);

				endforeach;

$fecha3=str_replace('-', '', $fecha2);
//$fecha33= date("d-m-Y", strtotime($fecha3) );
//str_replace('/','',$fecha)
$CodigoControl = new CodigoControl($nautoriza,$faac,$nnit,$fecha3,round(str_replace(',', '.', $ttotal), 0),$llave);
$generado=$CodigoControl->generar();	
////////////////////// generando codigo qr

include "../phpqrcode/qrlib.php";      
$ma=$generado;
//QRcode::png($ma);
//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = $ma;//codigocontrol;//nombre del archivo

$codeContents = $nnit.'|'.$faac.'|'.$nautoriza.'|'.$fechaqr.'|'.$ttotal.'|'.$ttotal.'|'.$ma.'|'.$nitv;// contenido del codigo de control

//$fileName = 'qrcode_name.png';
$fileName = '.png';
$filename2 = '../Controller/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
//$url = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 
				
				
				
//$objProducto->guardarTott($nomcli,$ttotal,$nnota,$idusu,$generado,$filename2,$nit,$nitcli,$nautoriza,$felim,$fecha2,$nfact);
				
//$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTotMvvv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$faac,$nnit,$nitv,$nautoriza,$felim,$ma,$filename2,$cosuc,$leyenda,$coddox,$cclix); /// fpg = IN,DEV,BJ
//$nfact=$nfact+1;
//$objProducto-> ActualizarFac($faac,$codsucfa);	

///registrar clientes
//$tt=$objProducto-> VerificaCi($nitv);
//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				
$tt=$objProducto-> VerificaNit($nitv);	
	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				

				
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
		
				
	case 3:
		//$objProducto = new Producto1();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Nota Eliminada correctamente';
		$json['success'] = true;
				
				$_SESSION['detalle'] = array();
				$json['success'] = true;
				echo json_encode($json);
	
		break;
		
	case 4:
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

	case 5:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nsuc=$_POST['nsuc']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetS($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codsucse);
			$objProducto->ActualizarArtS($idservicio, $cantidad);
			$objProducto->GuardarTraDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu);




//			$objProducto->Verificar($idservicio,$nsuc,$codg);
//				if ($totalreg>0){
//					//$x='si';
//					$objProducto->ActualizarSuc($idservicio, $cantidad,$nsuc,$codg);
//					
//					}else{
//					//$x='no';
//					
//							$resultado_producto = $objProducto->getById($idservicio);
//							$dservicio = $resultado_producto->fetchObject();
//							$descripcion = $dservicio->descripar;
//							$codcla = $dservicio->codcla;
//							$codpv = $dservicio->codpv;
//							$dctoar = $dservicio->dctoar;
//							$pneto = $dservicio->pnetoar;
//							$pvpx = $dservicio->pvpar;
//							$stock= $dservicio->stockmin;
//							$saldo = $dservicio->saldo;
//							$umed = $dservicio->umed;
//							$codigox= $dservicio->codigo;
//							$subcodigox = $dservicio->subcodigo;
//							$fotox = $dservicio->fotoar;
//							$qrfotox = $dservicio->qrfotoar;
//							$observx = $dservicio->observart;
//							$coddep = $dservicio->coddep;
//
//$objProducto->DuplicaArt($descripcion, $cantidad, $nsuc,$codg,$codcla,$codpv,$observx,$umed,$dctoar,$fotox,$qrfotox,$coddep,$pneto,$pvpx,$stock);
//
//					}

				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotMvS($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
$objProducto->guardarTraTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
	
				
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
require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nnitx=$_POST['nnit']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON
		$facx=$_POST['fac']; // recoge datos de ajax JSON
		$bsenx=$_POST['bsen']; // recoge datos de ajax JSON
		$bscax=$_POST['bsca']; // recoge datos de ajax JSON
		$movvv=$_POST['movvv']; // recoge datos de ajax JSON



//para ticket
$nnota = $objProducto->getCodnu();
		foreach($nnota as $nro):
			$nronota= $nro['nreg']+1;
		endforeach;


$nxr=0;
//para FACTURA
$buss = $objProducto->getDosificacion();
		foreach($buss as $nnn):
			//$nxr=$nxr+1;
			$nfac= $nnn['nfactura']+1;
			$nautoriza= $nnn['nautoriza'];
			$nnit= $nnn['nit'];
			$llave= $nnn['llave'];
			$felim= $nnn['fecha_lim'];
			$leyenda= $nnn['leyenda'];
		endforeach;

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;


		if (count($_SESSION['detalle'])>0) {
			try {
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$umed = $datos['umed'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigox = $datos['codigo'];
					$saldox = $datos['saldo'];
					$observ1 = $datos['observ'];

					$ttotal=$ttotal+$subtotal;

					$itm=$itm+1;
if ($facx=='SI'){	
			$objProducto->GuardarCarta($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nronota,$codigox,$umed,$observ1,$fechavv,$nfac,$movvv);
}else{
			$objProducto->GuardarCartaa($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nronota,$codigox,$umed,$observ1,$fechavv,$nfac,$movvv);
}

			$objProducto->ActualizarArticuloVenta($idservicio, $cantidad);

				endforeach;

$fecha2= date("Y-m-d", strtotime($fechav) );
$fechalim= date("Y-m-d", strtotime($felim) );
$fechaqr= date("d-m-Y", strtotime($fechav) );

if ($facx=='SI'){	
$fecha3=str_replace('-', '', $fecha2);
$CodigoControl = new CodigoControl($nautoriza,$nfac,$nnitx,$fecha3,round(str_replace(',', '.', $ttotal), 0),$llave);
$generado=$CodigoControl->generar();	
////////////////////// generando codigo qr

include "../phpqrcode/qrlib.php";      
$ma=$generado;
//QRcode::png($ma);
//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = $ma;//codigocontrol;//nombre del archivo
$codeContents = $nnit.'|'.$nfac.'|'.$nautoriza.'|'.$fechaqr.'|'.$ttotal.'|'.$ttotal.'|'.$ma.'|'.$nnitx;// contenido del codigo de control

//$fileName = 'qrcode_name.png';
$fileName = '.png';
$filename2 = '../Controller/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
//$url = EXAMPLE_TMP_URLRELPATH.$fileName;
QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 

$objProducto->guardarTotCot2($respo,$ttotal,$idusu,$generado,$filename2,$nnit,$nnitx,$nautoriza,$fechalim,$fecha2,$nfac,$leyenda,$bsenx,$itm,$movvv);
$objProducto->ActualizarFac($nfac);
$objProducto->ActualizaInforme1($ttotal,$idusuu);

}else{ /// fac si o no

$objProducto->guardarTotCot3($respo,$ttotal,$nronota,$idusu,$fecha2,$bsenx,$itm,$movvv);
$objProducto->Actualizarcodnu($nronota);
$objProducto->ActualizaInforme1($ttotal,$idusuu);
	
} // fac si o no

//$objProducto->Actualizarcodnu($nroing);
//$objProducto->guardarTotMvVenta($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$opbco,$cdbco,$opdeliv,$ttx3,$ttx2); /// fpg = IN,DEV,BJ
	
				
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
		

	case 7:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nsuc=$_POST['nsuc']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
					$codeptoo = $datos['codepto'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetS2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codeptoo);
			$objProducto->ActualizarArtS2($idservicio, $cantidad);
			$objProducto->GuardarTraDet2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codeptoo);

				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotMvS2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc,$codeptoo,$codsucu,$nsuc); /// fpg = IN,DEV,BJ
	
$objProducto->guardarTraTot2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc,$codeptoo,$codsucu); /// fpg = IN,DEV,BJ
	
	
				
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
		
	case 8:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$fpg=$_POST['fpg']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnuped();
		foreach($nnota as $nro):
			$nroing= $nro['nordenped']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
				$codsucx = $datos['codsucx'];
				$codclax = $datos['codclax'];
				$codpvx = $datos['codpvx'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetPed($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx);
			//$objProducto->ActualizarArtVenta($idservicio, $cantidad);

				endforeach;

$objProducto->ActualizarcodnuPed($nroing);
$objProducto->guardarTotMvPed($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix); /// fpg = IN,DEV,BJ
	
//if ($fpg=='CR'){
//	/// crear un registro de credito
//	$objProducto->RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing);	
//	}	
	
				
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
		

	case 9:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$cven=$_POST['cven']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
//			$objProducto->GuardarMvDetVen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codsucse);
			$objProducto->GuardarMvDetVen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven);

			$objProducto->ActualizarArtS($idservicio, $cantidad);
			$objProducto->GuardarVendeDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven);


				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotVende($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven); /// fpg = IN,DEV,BJ
	
$objProducto->guardarVendeTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven); /// fpg = IN,DEV,BJ
	
	
				
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


	case 10:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$fpg=$_POST['fpg']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
				$codsucx = $datos['codsucx'];
				$codclax = $datos['codclax'];
				$codpvx = $datos['codpvx'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetVenta10($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx,$idperx);
			$objProducto->ActualizarArtVenta($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTotMvVenta10($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$idperx); /// fpg = IN,DEV,BJ
	
if ($fpg=='CR'){
	/// crear un registro de credito
	$objProducto->RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing,$idperx);	
	}	
	
				
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



}
?>