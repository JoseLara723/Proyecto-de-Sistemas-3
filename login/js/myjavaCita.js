$(document).ready(pagination(1));
	 
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-artis').modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#grubu').on('change', function(){
		var grupp = $('#grubu').val();
//		var hasta = $('#bd-hasta').val();
		var url = '../php/si_busca_grupo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'grupp='+grupp,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});


	
	$('#bs-prod').on('change',function(){ //sisadal
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_Claa.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
			//return false;
		}
	});
	return false;
	});
	
});

function agregaRegiss(){ // sisadal
	var url = '../php/ci_agrega_Avisox.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}






function agregaRegistroDat1(){ // sisadal
	var url = '../php/ci_agrega_Dat1.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function editarDat1(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/ci_editaDat1.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idar').val(id);
				$('#descla').val(datos[0]);
//				$('#cii').val(datos[4]);
//				$('#dire').val(datos[1]);
//				$('#cel').val(datos[2]);
//				$('#emma').val(datos[3]);
//				$('#observv').val(datos[5]);
			
				$('#registra-artis').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

	
function editarProp1(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/ci_editaProp1.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').show();
				//$('#edi').show();
				$('#pro').val('Editar');
				$('#idar').val(id);
				$('#descri').val(datos[0]);
				$('#zon').val(datos[1]);
				$('#dire').val(datos[2]);
				$('#codep').val(datos[3]);
				$('#tm2').val(datos[5]);
				$('#com2').val(datos[6]);
				$('#pre').val(datos[26]);
				$('#dueno').val(datos[39]);
				$('#ci').val(datos[32]);
				$('#cel').val(datos[40]);
				$('#correo').val(datos[41]);
				
				$('#desta').val(datos[37]);
				$('#nvis').val(datos[36]);
				$('#nconsul').val(datos[38]);
				$('#npiso').val(datos[12]);
				$('#codclax').val(datos[30]);
				$('#codtrax').val(datos[29]);
				$('#codduex').val(datos[31]);


				var agu = datos[19];
				if (agu == "SI") {
                $('input:radio[name="agua"][value="SI"]').prop('checked', true);
           		 }
				if (agu == "NO") {
                $('input:radio[name="agua"][value="NO"]').prop('checked', true);
           		 }

				
				var luzz = datos[18];
				if (luzz == "SI") {
                $('input:radio[name="luz"][value="SI"]').prop('checked', true);
           		 }
				if (luzz == "NO") {
                $('input:radio[name="luz"][value="NO"]').prop('checked', true);
           		 }


				var ga = datos[20];
				if (ga == "SI") {
                $('input:radio[name="gas"][value="SI"]').prop('checked', true);
           		 }
				if (ga == "NO") {
                $('input:radio[name="gas"][value="NO"]').prop('checked', true);
           		 }


				var co2 = datos[21];
				if (co2 == "SI") {
                $('input:radio[name="coci"][value="SI"]').prop('checked', true);
           		 }
				if (co2 == "NO") {
                $('input:radio[name="coci"][value="NO"]').prop('checked', true);
           		 }

				var gar = datos[10];
				if (gar == "SI") {
                $('input:radio[name="gara"][value="SI"]').prop('checked', true);
           		 }
				if (gar == "NO") {
                $('input:radio[name="gara"][value="NO"]').prop('checked', true);
           		 }


				var co45 = datos[14];
				if (co45 == "SI") {
                $('input:radio[name="come"][value="SI"]').prop('checked', true);
           		 }
				if (co45 == "NO") {
                $('input:radio[name="come"][value="NO"]').prop('checked', true);
           		 }
				var liv = datos[13];
				if (liv == "SI") {
                $('input:radio[name="livin"][value="SI"]').prop('checked', true);
           		 }
				if (liv == "NO") {
                $('input:radio[name="livin"][value="NO"]').prop('checked', true);
           		 }

				var pa3 = datos[16];
				if (pa3 == "SI") {
                $('input:radio[name="parri"][value="SI"]').prop('checked', true);
           		 }
				if (pa3 == "NO") {
                $('input:radio[name="parri"][value="NO"]').prop('checked', true);
           		 }

				var pi9 = datos[17];
				if (pi9 == "SI") {
                $('input:radio[name="pisi"][value="SI"]').prop('checked', true);
           		 }
				if (pi9 == "NO") {
                $('input:radio[name="pisi"][value="NO"]').prop('checked', true);
           		 }


				var jar = datos[22];
				if (jar == "SI") {
                $('input:radio[name="jardi"][value="SI"]').prop('checked', true);
           		 }
				if (jar == "NO") {
                $('input:radio[name="jardi"][value="NO"]').prop('checked', true);
           		 }
				var dp = datos[11];
				if (dp == "SI") {
                $('input:radio[name="depo"][value="SI"]').prop('checked', true);
           		 }
				if (dp == "NO") {
                $('input:radio[name="depo"][value="NO"]').prop('checked', true);
           		 }

				var cal = datos[23];
				if (cal == "SI") {
                $('input:radio[name="calefo"][value="SI"]').prop('checked', true);
           		 }
				if (cal == "NO") {
                $('input:radio[name="calefo"][value="NO"]').prop('checked', true);
           		 }

				var ha8 = datos[27];
				if (ha8 == "SI") {
                $('input:radio[name="hax"][value=""]').prop('checked', true);
           		 }
				if (ha8 == "NO") {
                $('input:radio[name="hax"][value="NO"]').prop('checked', true);
           		 }


				$('#bano').val(datos[9]);
				$('#copais').val(datos[4]);
				$('#codep').val(datos[3]);



			
				$('#registra-artis').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}




function eliminarCita(id){ //SISADAL
	var url = '../php/ci_eliminaCita.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function mostrarfoto(id){ //sisadal
	
	var url = 'ci_verfotoAviso.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalfoto').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-foto').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function mostrarfotocarga(id){//SISADAL
	
	var url = 'ci_ver_fotoaviso.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalcargafoto').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-carga').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function reportePDF(){
	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/si_pdf_produ.php?grupox='+grupox);
}

//function reportePDF(){
////	var ido=id;
////	var desde = $('#bd-desde').val();
////	var hasta = $('#bd-hasta').val();
//	window.open('../php/z_pdf_personas.php');
//
//}
function pagination(partida){ /// sidsadal
	var url = '../php/ci_paginarCitas.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}