<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM solicitud WHERE codsol=-1"));
    $nroLotes = 2;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM solicitud WHERE codsol=-1 LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-condensed  ">
	<tr>
			                <td width="15%"Fecha</td>
			                <td width="10%">Nombre</td>
			                <td width="15%">Aviso</td>

			                <td width="8%">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td width="9%" align="left">'.$registro2['fechasol'].'</td>
							<td width="15%" align="left">'.$registro2['nombresol'].'</td>
							<td width="9%" align="left">'.$registro2['fechasol'].'</td>

							<td><a href="javascript:reportePDF('.$registro2['codpropi'].');" ><img src="login/recursos/pdf.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 </td>
							  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>