
<?php 
	session_start();
	$codh=$_SESSION['codh'];
	$codmovv=$_SESSION['codmov'];
	$nturno=$_SESSION['nturno'];
	$idusu=$_SESSION['id_usu'];

	
	$importe=$_POST['importe'];
	$fechacar=$_POST['fechacar'];
	$ndoc=$_POST['ndoc'];
	
	$fechacar2= date("Y-m-d", strtotime($fechacar) );
	
require_once '../Config/conexion.php';
require_once '../Model/Productohospe.php';
$objhabita= new	Producto(); //consulta a codnu

$busca_orden= $objhabita->ver_norden_codnu();
		foreach($busca_orden as $nordenn): 
				$n_orden=$nordenn['norden']+1;
				//echo 'Nro Orden:'.$n_orden;
		endforeach;

$habitaciones= $objhabita->GuardarCuentaTotal($codh,$codmovv,$nturno,$importe,$fechacar2,$n_orden,$ndoc,$idusu);
$objhabita->Actualizarcodnu($n_orden);

		$json = array();
		$json['msj'] = 'Habitacion cargada...';
		$json['success'] = true;

		if (isset($_POST['fechacar'])) {
			try {
				unset($_SESSION['hospedaje'][$_POST['fechacar']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
	
?>