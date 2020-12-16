<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM solicitud AS co LEFT JOIN
	 propiedades AS pro ON co.codpropi=pro.codpropi LEFT JOIN propietario AS pr ON pro.coddue=pr.coddue "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM solicitud AS co LEFT JOIN
	 propiedades AS pro ON co.codpropi=pro.codpropi LEFT JOIN propietario AS pr ON pro.coddue=pr.coddue LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%" align="center">Fecha de Solicitud</td>
			                <td width="10%" align="center">CODIGO</td>
			                <td width="15%" align="center">Solicitante</td>
			                <td width="10%" align="center">Celular</td>
			                <td width="12%" align="center">Correo</td>
			                <td width="20%" align="center">Titulo del Aviso</td>
			                <td width="12%" align="center">Propietario</td>
			                <td width="10%" align="center">Cel.Propietario</td>
			                <td width="12%" align="center">Correo Propietario</td>
			                <td width="20%" align="center">Observacion</td>

							<td width="10%" align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		
		
		$fe1= date("d-m-Y", strtotime($registro2['fechasol']) );
//		$fe2= date("d-m-Y", strtotime($registro2['fechacita']) );
		
		$tabla = $tabla.'<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center">'.$registro2['codigosol'].'</td>
							<td align="center">'.$registro2['nombresol'].'</td>
							<td align="center">'.$registro2['celusol'].'</td>
							<td align="center">'.$registro2['emailsol'].'</td>
							<td align="center">'.$registro2['descrippro'].'</td>
							<td align="left">'.$registro2['nombredue'].'</td>
							<td align="center">'.$registro2['celdue'].'</td>
							<td align="left">'.$registro2['emaildue'].'</td>
							<td align="left">'.$registro2['observsol'].'</td>
							<td align="center"> <a href="javascript:eliminarConsu('.$registro2['codsol'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>