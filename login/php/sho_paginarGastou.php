<?php
if (!isset($_SESSION)) {session_start();}
$idusu= $_SESSION['id_usu'];
$codsucx=$_SESSION['codsuc'];

date_default_timezone_set('America/La_Paz');

	include('conexion.php');
	$fecha = date('Y-m-d');
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM fgasto WHERE fechaga='$fecha' AND codsuc='$codsucx' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM fgasto WHERE fechaga='$fecha' AND codsuc='$codsucx' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
	  <tr>
	  <td width="15%">Detalle</td>
	  <td width="9%" align="center">Fecha</td>
	  <td width="10%" align="center">Importe</td>
	  <td width="10%" align="center">Opciones</td>

  </tr>';
		$tt=0;		
	while($registro2 = mysqli_fetch_array($registro)){
		$fech= date("d-m-Y", strtotime($registro2['fechaga']) );
		$tt+=$registro2['importega'];
		$tabla = $tabla.'<tr>
        <td>'.$registro2['descripga'].'</td>
        <td align="center">'.$fech.'</td>
        <td align="right">'.$registro2['importega'].'</td>
        <td align="center"><a href="javascript:eliminarGas('.$registro2['codga'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
           </td>
      </tr>';		
	}
	$tabla = $tabla. '<tr><td colspan="2" align="center">Totales...</td><td align="right">'.number_format($tt,2).'</td></tr>';        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>