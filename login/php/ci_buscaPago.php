<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM solicitud WHERE codigosol='$dato' ");



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-condensed">
        	  <tr>
			                <td width="15%">Fecha</td>
			                <td width="25%">Nombre</td>
			                <td width="20%">Aviso</td>

			                <td width="8%">Opciones</td>

			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td width="12%" align="left">'.$registro2['fechasol'].'</td>
							<td width="20%" align="left">'.$registro2['nombresol'].'</td>
							<td width="20%" align="left">'.$registro2['fechasol'].'</td>

							<td><a href="javascript:reportePDF('.$registro2['codpropi'].');" ><img src="login/recursos/pdf.png" data-toggle="tooltip" title="Descargar"></a>
							 </td>
							  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>