<?php
if (!isset($_SESSION)) {session_start();}

	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM personal"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM personal LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-condensed  ">';
		while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td align="left" width="50%"><a href="javascript:mostrarfoto('.$registro2['id_per'].');" ><img src="'.$registro2['fotoper'].'" width="400px" height="200"> </a></td>
							<td width="50%" align="left">'.$registro2['nombreper'].'</td>
							  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>
