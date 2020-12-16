<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];
include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM personalmoto AS pm LEFT JOIN personal AS pe ON pm.id_per=pe.id_per  "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM personalmoto AS pm LEFT JOIN personal AS pe ON pm.id_per=pe.id_per  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Nombre</td>
			                <td width="10%">CI.</td>
			                <td width="10%">Direccion</td>
			                <td width="10%">Telf/Cel</td>
			                <td width="10%">Placa</td>
			                <td width="5%">Asignado</td>

			                <td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombreper'].'</td>
							<td>'.$registro2['ciper'].'</td>
							<td>'.$registro2['direccper'].'</td>
							<td>'.$registro2['celper'].'</td>
							<td>'.$registro2['placa'].'</td>
							<td>'.$registro2['asignado'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['coden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['coden'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>