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
	
	$('#fefff').on('change', function(){
		var desde = $('#fei').val();
		var hasta = $('#fef').val();
		var idu = $('#idu').val();

		var url = '../php/aa_busca_fechas2.php';
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

	$(".vventasPdf").off("click");
	$(".vventasPdf").on("click", function(e) {
	var desde = $('#fei').val();
	var hasta = $('#fef').val();
	var idu = $('#idu').val();
		
	//	var desde = $('#desde').val();
	//	var hasta = $('#hasta').val();
		//window.open('../php/a_pdf_reporte3.php?desde='+desde+'&hasta='+hasta);
	   window.open('../php/a_pdf_venndia.php?desde='+desde+'&hasta='+hasta+'&idu='+idu);

	});
	
	$('#buscandoo').on('click', function(){
		var desde = $('#fei').val();
		var hasta = $('#fef').val();
		var idu = $('#idu').val();
		var url = '../php/sho_busca_Ventas.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta+'&idu='+idu,
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

	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_saldo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaRegistroClaa(){ // sisadal
	var url = '../php/aa_agrega_Claa.php';
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

function editarClaa(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/aa_edita_claa.php';
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


function VerKardex(codarx){
	var desde = $('#fei').val();
	var hasta = $('#fef').val();
	$('#codarxx').val(codarx);

	var partida=1;
	
	var url = '../php/aa_paginarKardex.php';
	$.ajax({
		type:'POST',
		url:url,
		//data:'idu='+idu,
		data:'codarx='+codarx+'&desde='+desde+'&hasta='+hasta,
		success:function(dataa){
			//var pregunta = confirm('¿Esta..................a?');
		//	$('.nv').fadeOut(400);
		//	$('.nv1').fadeIn(400);
//			$('.buscame').fadeOut(10);
			
			var array = eval(dataa);
			$('#agrega-registros').html(array[0]);
			//$('#pagination2').html(array[1]);
		}
	});
	return false;
}

function Recargar(){
	location.reload();
}



function eliminarClaa(id){ //SISADAL
	var url = '../php/aa_elimina_Claa.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function mostrarfoto(id){ //sisadal
	
	var url = 'far_verfotoArtix.php';
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
	
	var url = 'aa_ver_fotoPee.php';
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

function mostrarTicket(id){
	window.open('../php/a_pdf_ventass.php?idd='+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
	location.reload();
}


function reportePDFxx(){
	var desde = $('#fei').val();
	var hasta = $('#fef').val();
	var idu = $('#idu').val();

   window.open('../php/a_pdf_venndia.php?desde='+desde+'&hasta='+hasta+'&idu='+idu);
  // data:'desde='+desde+'&hasta='+hasta,
  //	window.open('../php/a_pdf_venndia.php');
}

//function reportePDF(){
////	var ido=id;
////	var desde = $('#bd-desde').val();
////	var hasta = $('#bd-hasta').val();
//	window.open('../php/z_pdf_personas.php');
//
//}
function pagination(partida){ /// sidsadal
	var url = '../php/sho_paginarVtta1.php';
	$.ajax({
		type:'POST',
		url:url,
        data:'partida='+partida,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
        
		// success:function(data){
		// 	var array = eval(data);
		// 	$('#agrega-registros').html(array[0]);
		// 	$('#pagination').html(array[1]);
		// }
	});
	return false;
}