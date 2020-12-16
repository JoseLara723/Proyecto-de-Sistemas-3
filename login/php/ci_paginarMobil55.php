<?php
if (!isset($_SESSION)) {session_start();}

	include('conexion.php');
//	$paginaActual = $_POST['partida'];
	$cla = $_POST['cla'];
	$tra = $_POST['tra'];
	$cdp = $_POST['cdp'];
	$cdpv = $_POST['cdpv'];
	$cdba = $_POST['cdba'];
	$cmon = $_POST['cmon'];

//data:'cla='+cla+'&tra='+tra+'&cdp='+cdp+'&cdpv='+cdpv+'&cdba='+cdba+'&cmon='+cmon,
//	$paginaActual = $_POST['partida'];

  	$registro = mysqli_query($conexion,"SELECT * FROM propiedades AS pro LEFT JOIN transaccion AS
	 tr ON pro.codtra=tr.codtra LEFT JOIN departamento AS de ON pro.coddep=de.coddep LEFT JOIN pais AS
	  pa ON pro.codpais=pa.codpais WHERE pro.blkpro!='NO' AND pro.codcla='$cla' AND pro.codtra='$tra' AND pro.coddep='$cdp' AND pro.codprov='$cdpv' AND pro.codba='$cdba' AND pro.tmoneda='$cmon'  ORDER BY pro.destaca ASC ");

  	//$tabla = $tabla.'<table class="table table-condensed  ">';
		while($registro2 = mysqli_fetch_array($registro)){
		$moneda=$registro2['tmoneda'];
		$foti=$registro2['fotoprop'];
		$foti2=substr($foti,3,40);
		$foti3='login/'.$foti2;
			
$fee= date("d-m-Y", strtotime($registro2['fechavence']) );
$fee2= date("d-m-Y", strtotime($registro2['fechareg']) );
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
			
if($op>=1){			
			
			
		echo '<div class="row mb-4">
          <div class="col-md-12">
            <div class="property-entry horizontal d-lg-flex">

              <a href="javascript:mostrarfoto('.$registro2['codpropi'].');" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">'.$registro2['descriptra'].'</span>
                  
                </div>
                
				
				<img src="'.$foti3.'" alt="Image" class="img-fluid">
              </a>

              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="#">'.$registro2['descrippro'].'</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-pencil"></span> '.$registro2['descripdepto'].'/'.$registro2['descrippais'].'</span>';
	
				echo '<span class="property-location d-block mb-3"><span class="property-icon icon-pencil"></span> '.'Restantes :'. $op.' Dias'.'</span>';

				if($moneda=='DO'){
                echo '<strong class="property-price text-primary mb-3 d-block text-success">$us :'.number_format($registro2['precio'],0).'</strong>';
				}else{
                echo '<strong class="property-price text-primary mb-3 d-block text-success">Bs. :'.number_format($registro2['precio'],0).'</strong>';
				}			
				
                
                echo '<p>Zona :'.$registro2['zona'].'</p>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
				  <a href="javascript:solicitando('.$registro2['codpropi'].');" class="btn btn-warning" role="button">SOLICITAR INFO</a> <a href="javascript:mostrarfotopropi('.$registro2['codpropi'].');" class="btn btn-dark" role="button">+ DETALLES</a>
                  </li>
				  
                  <li>
                    <span class="property-specs">Consultas</span>
                    <span class="property-specs-number">'.$registro2['nconsulta'].'</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Codigo:</span>
                    <span class="property-specs-number" align="center">'.$registro2['codpropi'].'</span>
                    
                  </li>

                  
                </ul>
              </div>
          </div>
        </div>

        
     
     
        
      </div>';		
	}
        
		}
   // $tabla = $tabla.'</table>';



//    $array = array(0 => $tabla,
//    			   1 => $lista);
//
//    echo json_encode($array);
?>
