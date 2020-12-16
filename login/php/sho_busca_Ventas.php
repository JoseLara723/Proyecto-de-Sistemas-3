<?php
if (!isset($_SESSION)) {session_start();}

$idusu=$_SESSION['id_usu'];


include('conexion.php');
date_default_timezone_set('America/La_Paz');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$idu = $_POST['idu'];

//echo $desde;
//echo $hasta;
//echo $idu;

//$desdee= date("d-m-Y", strtotime($desde) );
//$hastaa= date("d-m-Y", strtotime($hasta) );


//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
//$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE tipo='I'  AND fechato BETWEEN '$desde' AND '$hasta' ");

$registro = mysqli_query($conexion,"SELECT * FROM movimtot AS mt LEFT JOIN usuarios AS us ON mt.id_usu=us.id_usu  WHERE  mt.fechato BETWEEN '$desde' AND '$hasta' AND mt.id_usu='$idu'  ");


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



$reg = mysqli_query($conexion,"SELECT * FROM fgasto AS fg LEFT JOIN usuarios AS us ON fg.id_usu=us.id_usu  WHERE  fg.fechaga BETWEEN '$desde' AND '$hasta' AND fg.id_usu='$idu'  ");

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