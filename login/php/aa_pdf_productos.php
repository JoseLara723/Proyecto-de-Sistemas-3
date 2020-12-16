<?php
if (!isset($_SESSION)) {session_start();}
ini_set('max_execution_time', 15000); //300 seconds = 5 minutes


$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
$codsucx=$_SESSION['codsuc'];
//$dd = $_GET['idd'];
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('../php/conexion.php');
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
$html .= '<tr><td width="30%"><img src="../recursos/logintit.png" alt="WEBNET" width="70px" height="50px"/></td>';
$html .= '<td align="center" class="profo">LISTADO DE SALDOS</td><td align="center"  width="40%">Security</td></tr>';
$html .= '</table>';





$html .= '<br>';
$html .= '<table border="1" cellspacing="1" cellpadding="2%" WIDTH="100%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;

$html .='<tr>
			                <td width="15%">Producto</td>
			                <td width="7%">Color</td>
			                <td width="4%">U.Med.</td>
			                <td width="7%">P.Costo</td>
			                <td width="7%">P.Venta</td>
			                <td width="7%">Comision</td>

			                <td width="7%">Ingreso</td>
			                <td width="8%">Proveedor</td>
			                <td width="9%">Clasif.</td>
			                <td width="10%">Sucursal</td>
			                <td width="7%">Saldo</td>
			                <td width="15%">Observ.</td>
			            </tr>';
$it=0;
  	$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN proveedor AS pv ON 
	ar.codpv=pv.codpv JOIN clasificacion AS cl ON ar.codcla=cl.codcla JOIN sucursal AS su ON ar.codsuc=su.codsuc WHERE ar.codsuc='$codsucx' AND ar.saldo>0 ");




//$row = mysqli_query($conexion,"SELECT * FROM personas ORDER BY nombre ASC");
while ($registro2 = mysqli_fetch_array($row)) {
$it=$it+1;
$html .='<tr>
							<td>'.$registro2['descripar'].'</td>
							<td>'.$registro2['colorart'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pneto'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['comision'].'</td>
							<td>'.$registro2['feingar'].'</td>
							<td>'.$registro2['nombrepv'].'</td>
							<td>'.$registro2['descripcla'].'</td>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['saldo'].'</td>
							<td>'.$registro2['observart'].'</td>
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
$pdf->stream("Kardex_".rand(10,10000).".pdf", array("Attachment" => false));

?>