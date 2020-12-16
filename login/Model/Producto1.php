<?php
class Producto1
{

		function getmovimm($id_usu){
		$sql = "SELECT * FROM codnumov WHERE id_usu='$id_usu' AND turno='SI' ";
		global $cnx;
		return $cnx->query($sql);
	}

	
	function getpersonasgral(){
		$sql = "SELECT * FROM personal";
		global $cnx;
		return $cnx->query($sql);
	}


	function ActualizaInforme1($ttotal,$idusuu){
		$sql = "UPDATE codnumov SET totventas=totventas+'$ttotal'  WHERE turno='SI' AND id_usu='$idusuu' ";
		global $cnx;
		return $cnx->query($sql);
	}		

	function getVigente($id_usu){
		//$sql = "SELECT *  FROM vigente WHERE codsuc='$codsucx'  ";
		$sql = "SELECT * FROM codnumov WHERE id_usu='$id_usu' AND turno='SI' ";
		global $cnx;
		global $totalreg;
		$STH=$cnx->query($sql);
		return $STH->rowCount();
	}



	function getDosificacion(){
		$sql = "SELECT * FROM sni WHERE cd='X' ";
		global $cnx;
		return $cnx->query($sql);
	}
	function getCodnu(){
		$sql = "SELECT * FROM codnu ";
		global $cnx;
		return $cnx->query($sql);
	}


	function getImprimirVtaSuc(){
		$sql = "SELECT * FROM aarticulototal WHERE imprimio='NO'  ORDER BY fechacot DESC ";
		global $cnx;
		return $cnx->query($sql);
	}


	function ActualizarFac($nfac){
		$sql = "UPDATE sni SET nfactura='$nfac'";
		global $cnx;
		return $cnx->query($sql);
	}		

	function ActualFac($generado,$nfact){
		$sql = "UPDATE aarticulototal SET control='$generado'  WHERE norden='$nfact'";
		global $cnx;
		return $cnx->query($sql);
	}	

	function guardarTotCot2($respo,$ttotal,$idusu,$generado,$filename2,$nnit,$nnitx,$nautoriza,$fechalim,$fecha2,$nfac,$leyenda,$bsenx,$itm,$movvv){
$sql = "INSERT INTO aarticulototal (fechacot,cliente,totalbs,id_usu,tm,control,qrfoto,nit,nitcli,nautoriza,felimite,nfactura,imprimio,leyenda,tmm,pagocon,itm,codmov) values
 ('$fecha2','$respo','$ttotal','$idusu','E','$generado','$filename2','$nnit','$nnitx','$nautoriza','$fechalim','$nfac','NO','$leyenda','Factura','$bsenx','$itm','$movvv')";
		global $cnx;
		return $cnx->query($sql);
	}		

	function guardarTotCot3($respo,$ttotal,$nronota,$idusu,$fecha2,$bsenx,$itm,$movvv){
$sql = "INSERT INTO aarticulototal (fechacot,cliente,totalbs,norden,id_usu,tm,imprimio,tmm,pagocon,itm,codmov) values
 ('$fecha2','$respo','$ttotal','$nronota','$idusu','E','NO','Ticket','$bsenx','$itm','$movvv' )";
		global $cnx;
		return $cnx->query($sql);
	}		



	function GuardarCarta($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nronota,$codigox,$umed,$observ1,$fechavv,$nfac,$movvv){
$sql = "INSERT INTO aarticulodetalle (coda,descripcion,cant,precio,subtot,codg,tm,fechacot,nfactura,tmm,codmov)
 values('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$codigox','E','$fechavv','$nfac','Factura','$movvv')";
		global $cnx;
		return $cnx->query($sql);
	}

	function GuardarCartaa($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nronota,$codigox,$umed,$observ1,$fechavv,$nfac,$movvv){
$sql = "INSERT INTO aarticulodetalle (coda,descripcion,cant,precio,subtot,codg,tm,fechacot,norden,tmm,codmov)
 values('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$codigox','E','$fechavv','$nronota','Ticket','$movvv')";
		global $cnx;
		return $cnx->query($sql);
	}



	function getByIdCarta($id){
		$sql = "SELECT * FROM carta WHERE codcar=$id";
		global $cnx;
		return $cnx->query($sql);
	}


	function getById($id){
		$sql = "SELECT * FROM carta WHERE codcar=$id";
		global $cnx;
		return $cnx->query($sql);
	}

	function ActualizarArticulo($idservicio,$cantidad){
		$sql = "UPDATE aarticulo SET saldo=saldo+'$cantidad'  WHERE coda='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}	
	function ActualizarArticuloVenta($idservicio,$cantidad){
		$sql = "UPDATE carta SET saldo=saldo-'$cantidad'  WHERE codcar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}	



	function GuardarCotizacion($idservicio, $detalle, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg,$grupo){
$sql = "INSERT INTO aarticulodetalle (coda,descripcion,cant,precio,subtot,norden,codigo,foto,codg,tm,grupo,fechacot) values('$idservicio','$detalle','$cantidad','$precio','$subtotal','$nnota','$codigo','$foto','$codg','I','$grupo',NOW())";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function GuardarTotCot($observ,$ttotal,$nnota,$idusu,$grupo){
$sql = "INSERT INTO aarticulototal (fechacot,cliente,totalbs,norden,id_usu,tm,grupo) values (NOW(),'$observ','$ttotal','$nnota','$idusu','I','$grupo')";
		global $cnx;
		return $cnx->query($sql);
	}		


//GuardarCotizacion2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$foto,$codg,$umed,$observ1)
	
	function GuardarCotizacion2($idservicio, $detalle, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg,$grupo){
$sql = "INSERT INTO aarticulodetalle (coda,descripcion,cant,precio,subtot,norden,codigo,foto,codg,tm,grupo,fechacot) values('$idservicio','$detalle','$cantidad','$precio','$subtotal','$nnota','$codigo','$foto','$codg','E','$grupo',NOW())";
		global $cnx;
		return $cnx->query($sql);
	}

	function Actualizarcodnu($nronota){
		$sql = "UPDATE codnu SET nreg='$nronota'";
		global $cnx;
		return $cnx->query($sql);
	}		










	function GuardarMovservi($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$idusu,$norden){
$sql = "INSERT INTO movservi (umed,cods,detalle,cant,precio,totbs,codmov,codh,nombrecli,ndoc,nturno,codarea,fechas,tpago,codusu,norden) values
('$umed','$idservicio','$detalle','$cantidad','$precio','$subtotal','$codmovv','$codh','$encargado','$nnota','$nturno','S',NOW(),'$tpago','$idusu','$norden')";
		global $cnx;
		return $cnx->query($sql);
	}

	function GuardarCtaTotal($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$mr,$norden,$idusu){
$sql = "INSERT INTO cuentatotal (codh,codmov,nturno,codarea,importe,tpago,ie,fechacta,ndoc,mr,encargado,norden,codusu) values
('$codh','$codmovv','$nturno','S','$subtotal','$tpago','I',NOW(),'$nnota','$mr','$encargado','$norden','$idusu')";
		global $cnx;
		return $cnx->query($sql);
	}	
//	function GuardarMovservi1($idservico){
//$sql = "INSERT INTO movservi (fechas,cods) values (NOW(),'$idservicio')";
//		global $cnx;
//		return $cnx->query($sql);
//	}	
	
	function get(){
		$sql = "SELECT * FROM productos ORDER BY nomb_prod ASC";
		global $cnx;
		return $cnx->query($sql);
	}

	function getp(){
		$sql = "SELECT * FROM proveedor ORDER BY nombre ASC";
		global $cnx;
		return $cnx->query($sql);
	}
	


	function getdetalle($id){
		$sql = "SELECT * FROM servicio WHERE descripser LIKE '%$dato%' ORDER BY codser ASC";
		global $cnx;
		return $cnx->query($sql);
	}	
	function guardarVenta(){
		$sql = "INSERT INTO venta (fecha,tmov) values (NOW(),'E')";
		global $cnx;
		return $cnx->query($sql);
	}
	function guardarTotal($tot,$id,$enc,$not){
		//$sql = "INSERT INTO venta (fecha,tmov) values (NOW(),'E')";
		$sql = "UPDATE venta SET totalbs='$tot',encargado='$enc',norden='$not' WHERE id='$id'";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	function getUltimaVenta()
	{
		$sql = "SELECT LAST_INSERT_ID() as ultimo";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarDetalleVenta($idventa,$idproducto,$cantidad,$precio,$subtotal,$precio_dist,$id_prov){
		$sql = "INSERT INTO venta_detalle (idventa,idproducto,cantidad,precio,subtotal,tmov,precio_dist,id_prov) values ($idventa,$idproducto,$cantidad,'$precio','$subtotal','E','$precio_dist','$id_prov')";
		global $cnx;
		return $cnx->query($sql);
	}
	
		function incrementa_saldo($cantidad,$id){
		$sql = "UPDATE productos SET saldo=saldo-'$cantidad' WHERE id_prod='$id'";
		global $cnx;
		return $cnx->query($sql);
	}	
	

}
?>