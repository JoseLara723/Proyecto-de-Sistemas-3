<?php
include('2_numletras.php');

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];
$idu = $_GET['idu'];


require_once ('../dompdf/dompdf_config.inc.php');

require('../php/conexion.php');
$it=0;

$registro = mysqli_query($conexion,"SELECT * FROM movimtot AS mt LEFT JOIN usuarios AS us ON mt.id_usu=us.id_usu  WHERE mt.fechato BETWEEN '$desde' AND '$hasta' AND mt.id_usu='$idu'  ");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.titi {font-family: arial; font-size: 10px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic; padding-left:250px;}
.letra {font-family: arial; font-size: 9px;}
.norden {font-family: arial; font-size: 16px;}
.descrip {color: black; font-size: 12px; font-family: arial; }
.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
</style>' ;



$html .= '<div id="contenedor1">';

$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/logintit.png" alt="raul.webnet" width="50px" height="60px"/></td>';
$html .= '<td align="center" class="profo">VENTAS DEL DIA</td><td align="right">FABOLPAS.<br>La Paz -Bolivia</td></tr>';
$html .= '</table>';
 
$ttt=0;
$tct=0;

$html .='<table border="1" class="titi" WIDTH="100%" >
                  <tr class="ve"><td align="center" colspan="6" >VENTAS</td></tr>
                  <tr><td width="8%" align="center" >Fecha</td>
                  <td width="8%" align="center" >Usuario</td>
                      <td width="4%" align="center" >No Orden</td>
                      <td width="8%" align="center" >Tipo</td>
					  
               <td width="15%" align="center">Cliente</td>
                      <td width="4%" align="center">Items</td>
                      <td width="9%" align="center">Total </td>
                      
                  </tr>';
          
while($registro2 = mysqli_fetch_array($registro)){
  $ttt+=$registro2['importetot'];
	
$fech= date("d-m-Y", strtotime($registro2['fechato']) );
  $html .='<tr>
                            <td align="center">'.$fech.'</td>	
                            <td align="left">'.$registro2['nomb_usu'].'</td>							
              				<td align="center" >'.$registro2['norden'].'</td>
							
							<td >'.$registro2['clientenom'].'</td>
							<td align="center">'.$registro2['items'].'</td>
							<td align="right">'.number_format($registro2['importetot'],2).'</td>
									
						  </tr>';		
}
  
$html .='<tr><td colspan="5" align="center">Total Ventas Bs.-</td><td align="right">'.number_format($ttt,2).'</td></tr>';

$html .='</table>';


$reg = mysqli_query($conexion,"SELECT * FROM fgasto AS fg LEFT JOIN usuarios AS us ON fg.id_usu=us.id_usu  WHERE  fg.fechaga BETWEEN '$desde' AND '$hasta' AND fg.id_usu='$idu'  ");

$ttt1=0;
$html .='<table border="1" class="titi" WIDTH="70%" >
                  <tr class="ga">
                  <td align="center" colspan="4"  >GASTOS</td></tr>                      
                    <tr>
                    <td width="8%" align="center" >Fecha</td>
                    <td width="13%" align="center" >Usuario</td>
                      <td width="20%" align="center" >Detalle</td>
                      <td width="6%" align="center">Importe</td>
                  </tr>';

                  while($rek = mysqli_fetch_array($reg)){
                    $ttt1+=$rek['importega'];
                    $fechh= date("d-m-Y", strtotime($rek['fechaga']) );

                        $html .='<tr>
                                            <td align="center">'.$fechh.'</td>
                                            <td align="left" >'.$rek['nomb_usu'].'</td>

                                            <td align="left" >'.$rek['descripga'].'</td>
                                            <td align="right">'.number_format($rek['importega'],2).'</td>
                                          </tr>';		
                    }
                        
                    $html .='<tr><td colspan="3" align="center">Total Gastos Bs.-</td><td align="right">'.number_format($ttt1,2).'</td></tr>';

$tg=($tct)-$ttt1;

                    $html .='<tr class="tg"><td colspan="3" align="center">Total CAJA Bs.-</td><td align="right">'.number_format($tg,2).'</td></tr>';

                    $html .='</table>';













//$html = urlencode($html);
//echo "<a href='toPDF.php?html=$html'>Click Aqui para descargar el informe</a>";

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
//$pdf->load_html(utf8_decode($html));
//$pdf->load_html($html, 'UTF-8');
$pdf->load_html($html, 'UTF-8'); 
// Renderizamos el documento PDF.
$pdf->render();

//   header('Content-type: application/pdf');
 //   echo $pdf->output();
//$pdf->stream(); 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
//$pdf->stream('codexworld',array('Attachment'=>0));
$pdf->stream("VentasDia_".rand(10,10000).".pdf", array("Attachment" => false));


?>