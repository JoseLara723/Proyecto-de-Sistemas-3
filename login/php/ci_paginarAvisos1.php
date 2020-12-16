<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM propiedades ORDER BY codpropi DESC"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM propiedades ORDER BY codpropi DESC LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="6%" align="center">Registro</td>
			                <td width="6%" align="center">Vence</td>
			                <td width="20%" align="center">Detalle</td>
			                <td width="10%" align="center">Zona</td>
			                <td width="17%" align="center">Direccion</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="2%" align="center">Moneda</td>
							<td width="3%" align="center">Habilit.</td>
			                <td width="3%" align="center">Destac</td>
			                <td width="3%" align="center">No Visitas</td>
			                <td width="3%" align="center">No Consul</td>

			                <td width="5%" align="center">Imagen</td>

							<td width="9%" align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechareg']) );
		$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		
		$tabla = $tabla.'<tr>
							<td>'.$fe1.'</td>
							<td>'.$fe2.'</td>
<td><a href="javascript:editarProp1('.$registro2['codpropi'].');" >'.$registro2['descrippro'].'</a></td>							
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="center">'.$registro2['tmoneda'].'</td>
							
							<td align="center">'.$registro2['blkpro'].'</td>
							<td align="center">'.$registro2['destaca'].'</td>
							<td align="center">'.$registro2['nvisitas'].'</td>
							<td align="center">'.$registro2['nconsulta'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codpropi'].');" ><img src="'.$registro2['fotoprop'].'" width="30" height="30"> </a> </td>
							
							<td align="center"> <a href="javascript:eliminarProp1('.$registro2['codpropi'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript: mostrarfotocarga('.$registro2['codpropi'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							 <a href="javascript: masfotos('.$registro2['codpropi'].');" ><img src="../recursos/img-mas.png" data-toggle="tooltip" title="Mas Imagenes"></a>
							   </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>