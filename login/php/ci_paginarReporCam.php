<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM propiedades"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM propiedades LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="25%" align="center">Detalle</td>
			                <td width="10%" align="center">Zona</td>
			                <td width="20%" align="center">Direccion</td>
			                <td width="9%" align="center">Precio</td>
			                <td width="3%" align="center">Habilit.</td>
			                <td width="6%" align="center">Destacado</td>
			                <td width="6%" align="center">No Visitas</td>
			                <td width="6%" align="center">No Consultas</td>

			                <td width="5%" align="center">Imagen</td>


			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descrippro'].'</td>
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="center">'.$registro2['blkpro'].'</td>
							<td align="center">'.$registro2['destaca'].'</td>
							<td align="center">'.$registro2['nvisitas'].'</td>
							<td align="center">'.$registro2['nconsulta'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codpropi'].');" ><img src="'.$registro2['fotoprop'].'" width="30" height="30"> </a></td>							

							
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>