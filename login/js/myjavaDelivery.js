$(document).ready(paginar(1));
	 
$(function(){
	
	$('.btn-agreexx').on('click', function(){
		var pregunta = confirm('¿Agregando.......maa.......?');
		var id = $(this).attr("codx");
		$.ajax({
			url: 'login/Controller/ProductoController.php?page=1',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			var pregunta = confirm('¿Agregando.......?');
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
	
	
	
	$(".btn-agree").off("click");
	$(".btn-agree").on("click", function(e) {
		var pregunta = confirm('¿Agregando.......maa.......?');
		var id = $(this).attr("codx");
		$.ajax({
			url: 'login/Controller/ProductoController.php?page=1',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			var pregunta = confirm('¿Agregando.......?');
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
						//var pregunta = confirm('¿biennn Elimnando.............?');
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

	
});


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



function reportePDF(codpropix){
//	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
	window.open('login/php/ci_pdfPago.php?codpropix='+codpropix);
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