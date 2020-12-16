$(document).ready(paginar(1));
	 
$(function(){
	
	
	
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

	$('.csucux').on('change', function(){
		//var pregunta = confirm('¿Ingresoooo.............?');

		var csucx = $('.csucux').val();
		var url = 'login/php/sho_paginarDelivery2.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'csucx='+csucx,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('.cgrux').on('change', function(){
		//var pregunta = confirm('¿Ingresoooo.....GRU........?');

		var cgrux = $('.cgrux').val();
		var csucx = $('.csucux').val();
		var url = 'login/php/sho_paginarDelivery3.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'cgrux='+cgrux,
		//data:'cgrux='+cgrux+'&csucux='+csucux,			
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

function AnularPedido(){ //SISADAL
	var id='0';
	var url = 'login/php/a_eliminaPedido.php';
	var pregunta = confirm('¿Desea Anular todo el pedido ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			//$('#agrega-registros').html(registro);
			//return false;
		}
	});
	return false;
	}else{
		return false;
	}
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

function AgregarDelivery(id){ //delivery
	var url = 'login/php/ci_agregarDeli.php';
	//var pregunta = confirm('¿Agregando ...?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
						$(".detalle-producto").load('login/php/2_detalle_venta.php');

			$('#carrito-modal').modal({
						show:true,
						backdrop:'static'
			});
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


function VerIngredientes(id){ //delivery
	var url = 'login/php/aa_ingredientes.php';
	//var pregunta = confirm('¿Agregando iiiii...?');
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
						//$(".detalle-producto").load('login/php/2_detalle_venta.php');
			$('.agrega-ingre').html(registro);
			//return false;

			$('#carrito-ingre').modal({
						show:true,
						backdrop:'static'
			});
			return false;
		}
	});
	return false;
}



function reportePDF(codpropix){
//	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
	window.open('login/php/ci_pdfPago.php?codpropix='+codpropix);
}


function paginar(partida){ /// sidsadal
	//var pregunta = confirm('¿prueba a modal');
	var url = 'login/php/ci_paginarDelivery.php';
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