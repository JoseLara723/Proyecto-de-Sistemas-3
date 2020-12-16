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


function agregaAsigna(){ // sisadal
	var url = '../php/cho_agrega_asigna.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario3').serialize(),
		success: function(registro){
			if ($('#pro3').val() == 'Registro'){
			$('#formulario3')[0].reset();
			$('#mensaje3').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro3').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
				location.reload();
			return false;
			}else{
			$('#mensaje3').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
				location.reload();
			return false;
			}
		}
	});
	return false;
}



function agregaPrepa(){ // sisadal
	var url = '../php/ci_agrega_prepa.php';
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
				location.reload();
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

function Asignar(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario3')[0].reset();
	var url = '../php/sho_editaAsigna.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg3').hide();
				$('#edi3').show();
				$('#pro3').val('Editar');
				$('#idx3').val(id);
				$('#clie3').val(datos[1]);
				$('#pre3').val(datos[8]);
//				$('#ppre').val(datos[2]);
//				$('#ingre').val(datos[4]);
		
				$('#registra-asigna').modal({
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
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idx').val(id);
				$('#prepa').val(datos[0]);
				$('#cgru').val(datos[6]);
				$('#ppre').val(datos[2]);
				$('#ingre').val(datos[4]);
		
				$('#registra-artis').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}




function eliminarProp1(id){ //SISADAL
	var url = '../php/sho_eliminaAprobar.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function VerPedido(id){ //SISADAL
		//var pregunta = confirm('¿ver pedido ?');

	var url = '../php/sho_VerPedido.php';
//	if(pregunta==true){
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
//	}else{
//		return false;
//	}
}



function masfotos(id){ //SISADAL
	var url = '../php/aa_paginar_masfotos.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			$('.pagination').hide();
			//location.reload();
			return false;
		}
	});
	return false;
	//}else{
	//	return false;
	//}
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

function mostrarfoto2(id){ //sisadal
	
	var url = 'ci_verfotoAviso2.php';
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

function mostrarfoto3(id){ //sisadal
	
	var url = 'ci_verfotoAviso3.php';
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


function mostrarfotocarga2(id){//SISADAL
	
	var url = 'ci_ver_fotoaviso2.php';
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


function mostrarfotocarga3(id){//SISADAL
	
	var url = 'ci_ver_fotoaviso3.php';
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

function ImprimirPdfPedido(nordenx){
//	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/aa_pdf_PedidoDelivery.php?nordenx='+nordenx);
}


function pagination(partida){ /// sidsadal
	var url = '../php/sho_paginarAprobar.php';
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