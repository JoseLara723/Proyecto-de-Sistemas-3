<?php
if (!isset($_SESSION)) {session_start();}

$idusu=$_SESSION['id_usu'];
$codsucx=$_SESSION['codsuc'];

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');
//$coddepx= $_SESSION['depto'];
//$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
//$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	//$paginaActual = $_POST['partida'];

//     $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE tipo='E' AND fechato='$fecha' "));
//   // $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos "));

// 	$nroLotes = 10;
//     $nroPaginas = ceil($nroProductos/$nroLotes);
//     $lista = '';
//     $tabla = '';

//     if($paginaActual > 1){
//         $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
//     }
//     for($i=1; $i<=$nroPaginas; $i++){
//         if($i == $paginaActual){
//             $lista = $lista.'<li class="active"><a  href="javascript:pagination('.$i.');">'.$i.'</a></li>';
//         }else{
//             $lista = $lista.'<li ><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
//         }
//     }
//     if($paginaActual < $nroPaginas){
//         $lista = $lista.'<li><a  href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
//     }
  
//   	if($paginaActual <= 1){
//   		$limit = 0;
//   	}else{
//   		$limit = $nroLotes*($paginaActual-1);
//   	}

 	$registro = mysqli_query($conexion,"SELECT * FROM movimtot AS mt LEFT JOIN usuarios AS us ON mt.id_usu=us.id_usu  WHERE  mt.fechato='$fecha' AND mt.codsuc='$codsucx' AND estado='Cancelado' ");

 	//$registro = mysqli_query($conexion,"SELECT * FROM articulos  LIMIT $limit, $nroLotes ");
$ttt=0;
$tct=0;

  	echo'<table class="table table-bordered titi" >
                        <tr class="ve"><td align="center" colspan="8" >VENTAS</td></tr>
                        <tr><td width="8%" align="center" >Fecha</td>
                        <td width="8%" align="center" >Usuario</td>
			                <td width="4%" align="center" >No Orden</td>
							
                     <td width="15%" align="center">Cliente</td>
			                <td width="4%" align="center">Items</td>
							<td width="9%" align="center">Total </td>
							
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
  $ttt+=$registro2['importetot'];
		
  $fech= date("d-m-Y", strtotime($registro2['fechato']) );
		echo'<tr>
                            <td align="center">'.$fech.'</td>	
                            <td align="left">'.$registro2['nomb_usu'].'</td>							
              				<td align="center" >'.$registro2['norden'].'</td>
							
							<td >'.$registro2['clientenom'].'</td>
							<td align="center">'.$registro2['items'].'</td>
							<td align="right">'.number_format($registro2['importetot'],2).'</td>
									
						  </tr>';		
	}
        
	echo'<tr><td colspan="5" align="center">Total Ventas Bs.-</td><td align="right">'.number_format($ttt,2).'</td></tr>';

    echo'</table>';




  





    $reg = mysqli_query($conexion,"SELECT * FROM fgasto AS fg LEFT JOIN usuarios AS u ON fg.id_usu=u.id_usu WHERE  fg.fechaga='$fecha' AND fg.codsuc='$codsucx'  ");    
    $ttt1=0;
    echo'<table class="table table-bordered titi1" >
                      <tr class="ga">
                      <td align="center" colspan="4"  >GASTOS</td></tr>                      
                        <tr>
                        <td width="8%" align="center" >Fecha</td>
                        <td width="10%" align="center" >Usuario</td>
                          <td width="25%" align="center" >Detalle</td>
                          <td width="6%" align="center">Importe</td>
                      </tr>';

                      while($rek = mysqli_fetch_array($reg)){
                        $ttt1+=$rek['importega'];
                        $fechh= date("d-m-Y", strtotime($rek['fechaga']) );

                            echo'<tr>
                                                <td align="center">'.$fechh.'</td>
                                                <td align="left" >'.$rek['nomb_usu'].'</td>

                                                <td align="left" >'.$rek['descripga'].'</td>
                                                <td align="right">'.number_format($rek['importega'],2).'</td>
                                              </tr>';		
                        }
                            
                        echo'<tr><td colspan="3" align="center">Total Gastos Bs.-</td><td align="right">'.number_format($ttt1,2).'</td></tr>';
//$tg=$ttt-$ttt1;
$tg=($ttt)-$ttt1;

                        echo'<tr class="tg"><td colspan="3" align="center">Total CAJA Bs.-</td><td align="right">'.number_format($tg,2).'</td></tr>';

                        echo'</table>';

 
?>