<?php
class Producto1
{
	function getGrupo(){
		$sql = "SELECT * FROM grupos";
		global $cnx;
		return $cnx->query($sql);
	}
	function getSucursal(){
		$sql = "SELECT * FROM sucursal";
		global $cnx;
		return $cnx->query($sql);
	}

	
	

}
?>