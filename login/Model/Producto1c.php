<?php
class Producto1c
{
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
	
	function getById($id){
		$sql = "SELECT * FROM productos WHERE id_prod=$id";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarVenta(){
		$sql = "INSERT INTO venta (fecha,tmov) values (NOW(),'I')";
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
		$sql = "INSERT INTO venta_detalle (idventa,idproducto,cantidad,precio,subtotal,tmov,precio_dist,id_prov) values ($idventa,$idproducto,$cantidad,'$precio','$subtotal','I','$precio_dist','$id_prov')";
		global $cnx;
		return $cnx->query($sql);
	}
	
		function incrementa_saldo($cantidad,$id){
		$sql = "UPDATE productos SET saldo=saldo+'$cantidad' WHERE id_prod='$id'";
		global $cnx;
		return $cnx->query($sql);
	}	
	

}
?>