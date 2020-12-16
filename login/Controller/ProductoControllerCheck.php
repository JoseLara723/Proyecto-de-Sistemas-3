
<?php 
	session_start();
	$codh=$_SESSION['codh'];
	$codmovv=$_SESSION['codmov'];
	$nturno=$_SESSION['nturno'];
	//$importe=$_POST['importe'];
	$encargado=$_POST['encargado'];
	
//	$fechacar2= date("Y-m-d", strtotime($fechacar) );
$json = array();	
require_once '../Config/conexion.php';
require_once '../Model/Productocheck.php';

$objhabita= new	Producto1(); //consulta a codnu
$objhabita->CheckOutHabita($codh);

		
		$json['msj'] = 'Check Out Realizadoo Satisfactoriamente...';
		$json['success'] = true;

		echo json_encode($json);

?>