<?php
if (!isset($_SESSION)) {session_start();}

include('conexion.php');

$id = $_POST['id'];

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM menuu WHERE codme='$id' ");

	while($rg = mysqli_fetch_array($registro)){
				$det=$rg['detmenu'];
				$pre=$rg['precio'];
				$fotomex=$rg['fotome'];
				$codg=$rg['codgru'];
				$codsuc=$rg['codsuc'];

	}

				//$cant=1;
				//$subtotal = $cantidad * $precio;

//aumentar cantidad
if(count($_SESSION['detalle'])>0){
		$cont=0;
	    	foreach($_SESSION['detalle'] as $Reg){ 
				$iddx = $Reg['id'];
				if($iddx==$id){
					$cont=$cont+1;
					$cantx = $Reg['cant'];
				}
			}
	
		if($cont==0){
			$_SESSION['detalle'][$id] = array('id'=>$id, 'producto'=>$det, 'precio'=>$pre, 'codgru'=>$codg, 'cant'=>1, 'fotom'=>$fotomex, 'codsucc'=>$codsuc);
		}else{
			$cantx=$cantx+1;
				$_SESSION['detalle'][$id] = array('id'=>$id, 'producto'=>$det, 'precio'=>$pre, 'codgru'=>$codg, 'cant'=>$cantx, 'fotom'=>$fotomex, 'codsucc'=>$codsuc);
		}

}else{
//	unica vez
	$_SESSION['detalle'][$id] = array('id'=>$id, 'producto'=>$det, 'precio'=>$pre, 'codgru'=>$codg, 'cant'=>1, 'fotom'=>$fotomex, 'codsucc'=>$codsuc);
}


echo '';
?>