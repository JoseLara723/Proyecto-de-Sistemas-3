<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM cambalache AS ca LEFT JOIN departamento AS dp ON ca.coddep=dp.coddep LEFT JOIN provincia AS pv ON ca.codprov=pv.codprov LEFT JOIN propietariocam AS pc ON ca.coddue=pc.coddue ORDER BY ca.codcam DESC"));
    $nroLotes = 10;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion,"SELECT * FROM cambalache AS ca LEFT JOIN departamento AS dp ON ca.coddep=dp.coddep LEFT JOIN provincia AS pv ON ca.codprov=pv.codprov LEFT JOIN propietariocam AS pc ON ca.coddue=pc.coddue ORDER BY ca.codcam DESC LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="6%" align="center">Registro</td>
			                <td width="6%" align="center">Vence</td>
							
			                <td width="15%" align="center">Detalle</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="5%" align="center">Moneda</td>
							
			                <td width="10%" align="center">Zona</td>
			                <td width="7%" align="center">Depto</td>
			                <td width="7%" align="center">Provincia</td>
			                <td width="14%" align="center">Solicitante</td>
			                <td width="3%" align="center">Habil</td>
							
			                <td width="3%" align="center">No Consul</td>

			                <td width="5%" align="center">Imagen</td>

							<td width="15%" align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechacam']) );
		$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		
		//$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		$tabla = $tabla.'<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center"> '.$fe2.'</td>
							
<td><a href="javascript:editarProp1Cam('.$registro2['codcam'].');" >'.$registro2['detcambala'].'</a></td>								<td align="right">'.$registro2['precioca'].'</td>
							<td align="center">'.$registro2['tmoneda'].'</td>						
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							<td>'.$registro2['descripprovi'].'</td>
							<td>'.$registro2['nombredue'].'</td>
							<td>'.$registro2['blkcam'].'</td>
							
							<td align="center">'.$registro2['nconsul'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codcam'].');" ><img src="'.$registro2['fotoca1'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript:eliminarProp1('.$registro2['codcam'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['codcam'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							 <a href="javascript: masfotos('.$registro2['codcam'].');" ><img src="../recursos/img-mas.png" data-toggle="tooltip" title="Mas Imagenes"></a>
							   </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>