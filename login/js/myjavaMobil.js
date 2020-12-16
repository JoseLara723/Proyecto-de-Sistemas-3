$(document).ready();
//$(document).ready(paginar(1));
	 
$(function(){
	
	$(".btn-agregar-producto2").off("click");
	$(".btn-agregar-producto2").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-prod").val();
		var pventa = $("#pventa").val();
		var saldo = Number($("#saldo").val());
		
		if(!$("#sino").is(":checked")){
			var dcto='NO';
    	}else{
			var dcto='SI';		
		}
		
		if(!$("#facsino").is(":checked")){
			var fac='NO';
    	}else{
			var fac='SI';		
		}
		
		if(producto_id!=0){
			if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa, 'dcto':dcto, 'fac':fac},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/detalle1.php');
							//location.reload();
								//	$('#registra-producto').modal({
								//	show:hide,
								//	backdrop:'static'
								//	});
							
							
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('STOCK INSUFICIENTE...');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});

	
	
	$(".btn-agre").off("click");
	$(".btn-agre").on("click", function(e) {
				//var pregunta = confirm('¿Agregando.......maa.......?');

		var id = $(this).attr("codx");
		$.ajax({
			url: 'login/Controller/ProductoController.php?page=1',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			//var pregunta = confirm('¿Agregando.......?');
			//$(".detalle-producto").load('login/php/1_detalle_venta.php');

					$('#carrito-modal').modal({
						show:true,
						backdrop:'static'
					});

			
			if(data.success==true){
				alertify.success(data.msj);

				//$(".detalle-producto").load('login/php/detalle_porce.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	
	
	
	
	
	
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

	$('.regiss').on('click', function(){
		var pregunta = confirm('¿Agregando.......111.......?');
		//$('#formm1')[0].reset();
		var amor = $('#amor').val();
		var url = 'login/php/ci_buscaxxx.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'amor='+amor,
		success: function(datos){
			var pregunta = confirm('¿BIENNN.......?');
			//var array = eval(datos);
			//$('#agrega-registros').html(array[0]);
			//$('#paginando').html(array[1]);

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

	$(".eliminarItem").off("click");
	$(".eliminarItem").on("click", function(e) {
			//var pregunta = confirm('¿Elimnando.............?');
		var id = $(this).attr("id");
		$.ajax({
			url: 'login/Controller/ProductoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
						var pregunta = confirm('¿Eliminando Item......?');
				$(".checkout-right").load('login/php/1_detalle_venta.php');

			if(data.success==true){
				alertify.success(data.msj);
				//$(".checkout-right").load('../php/b_detalle_aplique.php');
				//$(".checkout-right").load('login/php/1_detalle_venta.php');

			}else{
				alertify.error(data.msj);
			}
		})
	});

	
	$('#codigo').on('change',function(){ //sisadal
	//var pregunta = confirm('¿Agregando..............?');
		var dato = $('#codigo').val();
		var url = 'login/php/ci_buscaPago.php';
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


function agregaConsulta(){ // sisadal
//var pregunta = confirm('¿Agregando..............?');
	var url = 'login/php/ci_agrega_Consulta.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registrado con exito').show(2000).delay(2500).hide(2000);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			location.reload();
			//$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			//$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}
 
function agregaRegisss(){ // sisadal
//var pregunta = confirm('¿Agregando...Cita...........?');
	var url = 'login/php/ci_agrega_Regisss.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario1').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario1')[0].reset();
			$('#mensaje').addClass('bien').html('Registrado con exito').show(2000).delay(2500).hide(2000);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			//location.reload();
			//$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#formulario1')[0].reset();	
			$('#mensaje').addClass('bien').html('Se registro su pedido con EXITO').show(200).delay(2500).hide(200);
			//$('#agrega-registros').html(registro);
			$(location).attr('href','index.php');	
			//location.reload();
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

function solicitando(codpropix){
				$('#codx').val(codpropix);
				$('#pro').val('Registro'); 
				$('#myModal').modal({
					show:true,
					backdrop:'static'
				});
	return false;
}




function eliminarDat1(id){ //SISADAL
	var url = '../php/ci_eliminaDat1.php';
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
	
	var url = 'ci_verfoto.php';
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

function mostrarfotopropi(id){ //sisadal
	//var pregunta = confirm('¿prueba a modal');
	var url = 'login/php/ci_verpropi.php';
	$('#myModal2').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(datos){
			//var pregunta = confirm('¿ok ko ok');
			$('#datospropie').html(datos);
			return false;
		}
	});
	return false;
}

function mostrarfotocarga(id){//SISADAL
	
	var url = 'ci_ver_foto.php';
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

function CancelarPedido(){
	$(location).attr('href','index.php');
}

function reportePDFdelivery(){
//	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
//	window.open('login/php/ci_pdfPago.php?codpropix='+codpropix);
	window.open('login/php/aa_pdf_PedidoDelivery.php');

}


function sumar1(id){ //delivery
	var url = 'login/php/ci_agregarDeli.php';
	//var pregunta = confirm('¿Agregando ...?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			location.reload();
			
			
			//$('#div1').animate({scrollTop: $('#div1')[0].scrollHeight}, 9000);
			//$("#div1").scrollTop($("#div1")[0].scrollHeight);
						//$("#div1").load('login/php/1_detalle_venta.php');

//			$('#carrito-modal').modal({
//						show:true,
//						backdrop:'static'
//			});
			//$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	//}else{
	//	return false;
	//}
}

function restar1(id){ //delivery
	var url = 'login/php/ci_restarDeli.php';
	//var pregunta = confirm('¿Agregando ...?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			location.reload();
						//$(".detalle-producto").load('login/php/2_detalle_venta.php');

//			$('#carrito-modal').modal({
//						show:true,
//						backdrop:'static'
//			});
			//var pregunta = confirm('¿SAlio bien ...?');
			//$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	//}else{
	//	return false;
	//}
}







function paginar(partida){ /// sidsadal
	//var pregunta = confirm('¿prueba a modal');
	var url = 'login/php/ci_paginarMobil5.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			//var pregunta = confirm('¿finnnnn a modal');
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#paginando').html(array[1]);
		}
	});
	return false;
}