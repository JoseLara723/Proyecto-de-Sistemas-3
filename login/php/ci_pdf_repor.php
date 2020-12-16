<?php
if (!isset($_SESSION)) {session_start();}
ini_set('max_execution_time', 15000); //300 seconds = 5 minutes


//$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
//$codsucx=$_SESSION['codsuc'];
//$dd = $_GET['idd'];
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('conexion.php');
//$row1= mysql_query($conexion,"SELECT * FROM personas WHERE id_per='$dd'");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.tamletra {font-family: arial; font-size: 10px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic;}
.profo {font-family: arial; font-size: 15px;}
.norden {font-family: arial; font-size: 25px;}
.descrip {color: black; font-size: 14px; font-family: arial; }
.tot { text-align: right font-family: arial; font-size: 16px;  background: yellow; padding-left:315px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 12px; padding-top:12px}
#logito {
  position: absolute;
  top:  1px; 
  left: 1px;
}

</style>' ;

$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/logO1.png" alt="WEBNET" width="70px" height="50px"/></td>';
$html .= '<td align="center" class="profo">REPORTE DE INMUEBLES</td><td align="right"  width="40%">Inmuebles</td></tr>';
$html .= '</table>';





$html .= '<br>';
$html .= '<table border="1" cellspacing="1" cellpadding="2%" WIDTH="100%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 11px; }</style>' ;

$html .='<tr>
			                <td width="15%" align="center">Detalle</td>
			                <td width="9%" align="center">Zona</td>
			                <td width="15%" align="center">Direccion</td>
			                <td width="7%" align="center">Precio</td>
			                <td width="10%" align="center">Propietario</td>
			                <td width="10%" align="center">Direcc.Prop.</td>
			                <td width="10%" align="center">Cel.Prop.</td>
			                <td width="10%" align="center">Correo Prop.</td>

			            </tr>';
$it=0;
$row = mysqli_query($conexion,"SELECT * FROM propiedades AS pro LEFT JOIN propietario AS pr ON pro.coddue=pr.coddue ");


//$row = mysqli_query($conexion,"SELECT * FROM personas ORDER BY nombre ASC");
while ($registro2 = mysqli_fetch_array($row)) {
$it=$it+1;
$html .='<tr>
							<td>'.$registro2['descrippro'].'</td>
							<td>'.$registro2['zona'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="center">'.$registro2['nombredue'].'</td>
							<td align="center">'.$registro2['direccdue'].'</td>
							<td align="center">'.$registro2['celdue'].'</td>
							<td align="center">'.$registro2['emaildue'].'</td>
						  </tr>';

}

$html .= '</table>';






//echo $html;
//$html = urlencode($html);
//echo "<a href='toPDF.php?html=$html'>Click Aqui para descargar el informe</a>";

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "landscape");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
//$pdf->stream('codexworld',array('Attachment'=>0));
$pdf->stream("ReporInmueble_".rand(10,10000).".pdf", array("Attachment" => false));

?>