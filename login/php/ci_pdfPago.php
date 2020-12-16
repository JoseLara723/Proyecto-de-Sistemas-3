<?php
if (!isset($_SESSION)) {session_start();}
//$codde=$_SESSION['depto'];
//$codsucx=1;//$_SESSION['codsuc'];
date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');


include('2_numletras.php');
require('conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$codd = $_GET['codpropix'];
//mysqli_query($conexion,"UPDATE propiedades SET imprimio='SI' WHERE norden='$norden'");

//$leyy = mysqli_query($conexion,"SELECT * FROM dosificacion WHERE cdfac='X' AND codsuc='$codsucx' ");
//
//while ($lee = mysqli_fetch_array($leyy)) {
//	$leyendax=$lee['leyenda'];
//}




$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.facc {font-family: arial; font-size: 15px ;}
.lfactura {font-family: arial; font-size: 16px font-style: italic;}
.slogan {font-family: arial; font-size: 12px font-style: italic;}

.elcontrol {font-family: arial; font-size: 16px font-style: italic;}
.tick {font-family: arial; font-size: 25px;}
.norden {font-family: sans-serif; font-size: 16px;}
.deticket {color: black; font-size: 10px; font-family: sans-serif; }
.deticket1 {color: black; font-size: 13px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
</style>' ;




 
//$html .='<hr></hr>';
$ttt=0.00;
$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/logo1.png" alt="WEBNET" width="70px" height="50px"/></td>';
$html .= '<td align="center" class="profo">DETALLE DEL AVISO</td><td align="right"  width="40%">Inmobiliaria</td></tr>';
$html .= '</table>';

$html .= '<table border="1"  WIDTH="100%" class="deticket" >';
$html .= '<tr><td align="center">Inmobiliaria</td><td align="center">Fecha de Emision</td>';
$html .= '<tr ><td WIDTH="25%" align="center">Tu Techo</td><td WIDTH="30%" align="center">'.$fecha.'</td>';
$html .= '</tr>';

$html .= '</table>';

$row = mysqli_query($conexion,"SELECT * FROM propiedades AS pr LEFT JOIN propietario AS pro ON pr.coddue=pro.coddue WHERE pr.codpropi='$codd' ");


$html .= '<table border="1"  WIDTH="100%" class="deticket" >';
//$html .='<style>body { font-family: arial; font-size: 14px; }</style>' ;
$html .= '<tr><td align="center">Descripcion</td><td align="center">Zona</td><td align="center">Direccion</td><td align="center">Area Tot.</td>
<td align="center">Area Contr.</td><td align="center">Precio $us</td>';

while ($row22 = mysqli_fetch_array($row)) {
//$it=$it+1;
$html .= '<tr ><td WIDTH="25%" align="center">'.$row22['descrippro'].'</td><td WIDTH="30%" align="center">'.$row22['zona'].'</td>
<td WIDTH="30%" >'.$row22['direccion'].'</td><td WIDTH="30%" align="center">'.$row22['areatot'].'</td><td WIDTH="30%" align="center">'.$row22['areaconstru'].'</td>
<td WIDTH="30%" align="center">'.$row22['precio'].'</td>';

//$html .= '<td WIDTH="40%"><img src='.$row22['fotoprop'].'  width="200" height="200"> </td>';

$html .= '</tr>';



$banos=$row22['banos'];
$garaje=$row22['garaje'];
$depo=$row22['deposito'];
$pisos=$row22['pisos'];
$living=$row22['living'];
$comedor=$row22['comedor'];
$emple=$row22['empleada'];
$parri=$row22['parrillero'];
$pisi=$row22['piscina'];
$luz=$row22['luz'];
$agua=$row22['agua'];
$gas=$row22['gas'];
$cocina=$row22['cocina'];
$jardin=$row22['jardin'];
$calefon=$row22['calefon'];
$obv=$row22['observpropi'];
$foto=$row22['fotoprop'];


$nodue=$row22['nombredue'];
$celdue=$row22['celdue'];
$dirdue=$row22['direccdue'];
$emaildue=$row22['emaildue'];

}


//$html .= '<img src='.$foto.'  width="200" height="200">';
$html .='</table>';



$html .= '<table border="1"  WIDTH="100%" class="deticket">';
$html .= '<tr><td width="15%" align="center">Baños</td><td width="10%" align="center">'.$banos.'</td><td WIDTH="75%" rowspan="14" align="center"><img src='.$foto.'  width="300px" height="300px"> </td></tr>';
$html .= '<tr><td width="20%" align="center">Agua</td><td width="10%" align="center">'.$agua.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Luz</td><td width="10%" align="center">'.$luz.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Gas</td><td width="10%" align="center">'.$gas.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Pisos</td><td width="10%" align="center">'.$pisos.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Cocina</td><td width="10%" align="center">'.$cocina.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Comedor</td><td width="10%" align="center">'.$comedor.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Living</td><td width="10%" align="center">'.$living.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Garaje</td><td width="10%" align="center">'.$garaje.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Deposito</td><td width="10%" align="center">'.$depo.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Piscina</td><td width="10%" align="center">'.$pisi.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Jardin</td><td width="10%" align="center">'.$jardin.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Calefon</td><td width="10%" align="center">'.$calefon.'</td></tr>';
$html .= '<tr><td width="20%" align="center">Parrillero</td><td width="10%" align="center">'.$parri.'</td></tr>';

$html .= '</table>';

$html .= '<table border="1"  WIDTH="100%" class="deticket">';
$html .= '<tr><td  align="center">Propietario</td><td  align="center">Direccion</td><td  align="center">Cel/Telf</td><td  align="center">Correo</td></tr>';
$html .= '<tr><td align="left">'.$nodue.'</td><td align="left">'.$dirdue.'</td><td align="left">'.$celdue.'</td><td align="left">'.$emaildue.'</td></tr>';
$html .= '</table>';


$rowd = mysqli_query($conexion,"SELECT * FROM solicitud WHERE codpropi='$codd' ");

while ($rdd = mysqli_fetch_array($rowd)) {
	$codigox=$rdd['codigosol'];
}


$html .= '<table border="1"  WIDTH="100%" class="deticket" >';
$html .= '<tr><td  align="center" width="80%">Observaciones</td> <td  align="center" width="30%">CODIGO</td></tr>';
$html .= '<tr><td align="left">'.$obv.'</td><td align="center" class="facc">'.$codigox.'</td></tr>';
$html .= '</table>';



$roe = mysqli_query($conexion,"SELECT * FROM propiedades AS pro LEFT JOIN pais AS pa ON pro.codpais=pa.codpais LEFT JOIN
departamento AS dep ON pro.coddep=dep.coddep LEFT JOIN clase AS cla ON pro.codcla=cla.codcla LEFT JOIN transaccion AS tra ON 
pro.codtra=tra.codtra WHERE pro.codpropi='$codd' ");




while ($rd1 = mysqli_fetch_array($roe)) {
	$pais=$rd1['descrippais'];
	$depto=$rd1['descripdepto'];
	$clase=$rd1['descripcla'];
	$tran=$rd1['descriptra'];

}


$html .= '<table border="1"  WIDTH="100%" class="deticket" >';
$html .= '<tr><td  align="center" width="15%">Pais</td> <td  align="center" width="15%">Departamento</td><td  align="center" width="15%">Clase</td>
<td  align="center" width="15%">Transaccion</td></tr>';
$html .= '<tr><td align="center">'.$pais.'</td><td align="center" >'.$depto.'</td><td align="center" ">'.$clase.'</td>
<td align="center" >'.$tran.'</td></tr>';
$html .= '</table>';




$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "portrait");

//$paper_size = array(0,0,500,900);
//$paper_size = array(0,0,209.76,297.64);
//$paper_size = array(0,0,297.64,419.53);
//$paper_size =array(0,0,419.53,595.28);
//
//
//$pdf->set_paper($paper_size);
 
 
 
// Cargamos el contenido HTML.
//$pdf->load_html(utf8_decode($html));
$pdf->load_html($html, 'UTF-8'); 
// Renderizamos el documento PDF.
$pdf->render();

//   header('Content-type: application/pdf');
 //   echo $pdf->output();
//$pdf->stream(); 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
//$pdf->stream('codexworld',array('Attachment'=>0));
$pdf->stream("aviso_"."Codigo_".$codigox."_".rand(10,1000).".pdf", array("Attachment" => false));


?>