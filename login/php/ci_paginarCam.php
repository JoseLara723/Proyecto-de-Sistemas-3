<?php
if (!isset($_SESSION)) {session_start();}

	include('conexion.php');

	$cdg = $_POST['cdg'];
	$cciu = $_POST['cciu'];
	$cpvv = $_POST['cpvv'];
	$cmo = $_POST['cmo'];



  	$registro = mysqli_query($conexion,"SELECT * FROM cambalache AS ca LEFT JOIN departamento AS de ON ca.coddep=de.coddep  WHERE ca.blkcam!='NO' AND ca.coddep='$cciu' AND ca.codprov='$cpvv' AND ca.tmoneda='$cmo' AND ca.codclac='$cdg' ");

  	//$tabla = $tabla.'<table class="table table-condensed  ">';
		while($registro2 = mysqli_fetch_array($registro)){
			
		$moneda=$registro2['tmoneda'];
		$foti=$registro2['fotoca1'];
		$foti2=substr($foti,3,40);
		$foti3='login/'.$foti2;

			$fee= date("d-m-Y", strtotime($registro2['fechavence']) );
			$fee2= date("d-m-Y", strtotime($registro2['fechacam']) );
$dia = substr($fee, 0,2);    // desde la posicion 0 dos digitos
$mes = substr($fee, 3,2);    // desde la posicion 0 dos digitos
$anio = substr($fee, 6,4);    // desde la posicion 0 dos digitos

$hora = substr($fee, 11,2);    // desde la posicion 0 dos digitos
$min = substr($fee, 14,2);    // desde la posicion 0 dos digitos
$seg = substr($fee, 17,2);    // desde la posicion 0 dos digitos
//
$nn1 = time(); /// FECHA ACTUAL EN FORMATO UNIX			
$nn= mktime($hora,$min,$seg,$mes,$dia,$anio); // coloca en una variable $nn el UNIX			
$op=round(($nn-$nn1)/86400);			
			
			
			
		echo '<div class="row mb-4">
          <div class="col-md-12">
            <div class="property-entry horizontal d-lg-flex">

              <a href="javascript:mostrarfoto('.$registro2['codcam'].');" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">'.$registro2['detcambala'].'</span>
                  
                </div>
                
				
				<img src="'.$foti3.'" alt="Image" class="img-fluid">
              </a>

              <div class="p-4 property-body">
                 
                <span class="property-location d-block mb-3"><span class="property-icon icon-pencil"></span> '.$registro2['descripdepto'].'</span>
                <p>Zona :'.$registro2['zona'].'</p>';
			
			echo '<span class="property-location d-block mb-3"><span class="property-icon icon-pencil"></span> '.'Restantes :'. $op.' Dias'.'</span>';
			
				if($moneda=='DO'){
                echo '<strong class="property-price text-primary mb-3 d-block text-success">$us :'.number_format($registro2['precioca'],0).'</strong>';
				}else{
                echo '<strong class="property-price text-primary mb-3 d-block text-success">Bs. :'.number_format($registro2['precioca'],0).'</strong>';
				}			
			
				
				
				
				
                echo '<ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
				  <a href="javascript:solicitando('.$registro2['codcam'].');" class="btn btn-warning" role="button">SOLICITAR INFO</a> <a href="javascript:mostrarfotopropi('.$registro2['codcam'].');" class="btn btn-dark" role="button">+ DETALLES</a>
                  </li>
                  <li>
                    <span class="property-specs">Consultas</span>
                    <span class="property-specs-number">'.$registro2['nconsul'].'</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Codigo:</span>
                    <span class="property-specs-number" align="center">'.$registro2['codcam'].'</span>
                    
                  </li>

                  
                </ul>
              </div>
          </div>
        </div>

        
     
     
        
      </div>';		
	}
        

   // $tabla = $tabla.'</table>';



//    $array = array(0 => $tabla,
//    			   1 => $lista);
//
//    echo json_encode($array);
?>
