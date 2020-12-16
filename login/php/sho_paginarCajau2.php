<?php
if (!isset($_SESSION)) {session_start();}
$codsucx= $_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE codsuc='$codsucx'"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE codsuc='$codsucx' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%" align="center">Fecha</td>
			                <td width="4%" align="center">No Orden</td>
			                <td width="10%" align="center">Cliente</td>
			                <td width="15%" align="center">Direccion</td>
			                <td width="10%" align="center">Celular</td>
			                <td width="3%" align="center">Items</td>
			                <td width="5%" align="center">Importe</td>
			                <td width="7%" align="center">Estado</td>
							<td width="10%" align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechato']) );
//		$fe2= date("d-m-Y", strtotime($registro2['fechavence']) );
		$estax=$registro2['estado'];
		$tabla = $tabla.'<tr>
							<td align="center">'.$fe1.'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td>'.$registro2['clientenom'].'</td>
							<td>'.$registro2['direccionmv'].'</td>
							<td>'.$registro2['celmv'].'</td>
							<td align="center">'.$registro2['items'].'</td>
							<td align="right">'.$registro2['importetot'].'</td>
							<td align="center">'.$registro2['estado'].'</td>

							<td align="center">  <a href="javascript:VerPedido('.$registro2['norden'].');" ><img src="../recursos/buscar1.png" data-toggle="tooltip" title="Ver Pedido"></a> <a href="javascript:ImprimirPdfPedido('.$registro2['norden'].');" ><img src="../recursos/impresora2.png" data-toggle="tooltip" title="Imprimir Nota"></a>';
							if($estax=='Enviado'){
							$tabla = $tabla.'<a href="javascript:Asignar('.$registro2['norden'].');" ><img src="../recursos/pagos.png" data-toggle="tooltip" title="Registrar Pago"></a>';
								
							}
		
							$tabla = $tabla.'</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>