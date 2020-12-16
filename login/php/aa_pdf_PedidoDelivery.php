<?php
if (!isset($_SESSION)) {session_start();}
ini_set('max_execution_time', 15000); //300 seconds = 5 minutes

$nordenx = $_GET['nordenx'];

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
require('../php/conexion.php');


$html ='<style>body { font-family: arial; font-size: 14px; }

.profo {font-family: arial; font-size: 15px;}
.cabeza {font-family: arial; font-size: 11px;}
.titi {font-family: arial; font-size: 10px;}
.norden {font-family: arial; font-size: 15px;}

.tot { text-align: right font-family: arial; font-size: 16px;  background: yellow; padding-left:315px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 12px; padding-top:12px}
#logito {
  position: absolute;
  top:  1px; 
  left: 1px;
}

</style>' ;

$html .= '<table border="0" WIDTH="60%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/logintit.png" alt="WEBNET" width="70px" height="50px"/></td>';
$html .= '<td align="left" colspan="1" class="profo">NOTA DE PEDIDO</td></tr>';
$html .= '</table>';


$html .= '<br>';


$it=0;
$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$nordenx' ");
$html .='<table border="0" width="60%">';

while($registro2 = mysqli_fetch_array($registro)){
		$fe1= date("d-m-Y", strtotime($registro2['fechato']) );
		$estax=$registro2['estado'];
		$html .='<tr class="cabeza">
							<td align="left">Fecha :</td><td align="left">'.$fe1.'</td>
							<td align="right" class="norden">No Orden :</td><td align="left" class="norden">'.$registro2['norden'].'</td></tr>
							<tr class="cabeza"><td align="left">Cliente :</td><td>'.$registro2['clientenom'].'</td></tr>
							<tr class="cabeza"><td align="left">Direccion :</td><td>'.$registro2['direccionmv'].'</td></tr>
							<tr class="cabeza"><td align="left">Celular :</td><td>'.$registro2['celmv'].'</td></tr>';		
	}

  	$reg = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$nordenx' ");
$html .='<table border="1" class="titi" width="60%">
			            <tr><td colspan="4" align="center">DETALLE</td></tr>
			             <tr><td width="25%" align="center">Producto</td>
			                <td width="4%" align="center">Cant.</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="7%" align="center">Sub-Total</td>
			            </tr>';
$tott=0;
	while($rex = mysqli_fetch_array($reg)){
//				$fe1= date("d-m-Y", strtotime($registro2['fechato']) );
		$sub=$rex['cant']*$rex['preciodt'];
		$tott+=$sub;
		$html .='<tr>
							<td>'.$rex['detmenu'].'</td>
							<td align="center">'.$rex['cant'].'</td>
							<td align="right">'.$rex['preciodt'].'</td>
							<td align="right">'.$rex['subtot'].'</td>

							</tr>';
	}
$html .='<tr><td colspan="3" align="right">Totales Bs.</td><td align="right">'.number_format($tott,2).'</td></tr>';
$html .='</table>';


// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
$pdf->stream("Kardex_".rand(10,10000).".pdf", array("Attachment" => false));

?>