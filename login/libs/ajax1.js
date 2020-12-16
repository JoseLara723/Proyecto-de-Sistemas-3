$(function(){
	var ENV_WEBROOT = "../";
	
	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = $("#txt_cantidad").val();
		var producto_id = $("#cbo_producto").val();
		if(producto_id!=0){
			if(cantidad!=''){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#txt_cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/detalle1.php');
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('Ingrese una cantidad');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	
	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../Controller/ProductoController1.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/detalle1.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	

	$(".irmodal").click(function(e){
		$("#myModal").modal('show');
	});

	$(".guardar-carrito2").off("click");
	$(".guardar-carrito2").on("click", function(e) {
		var encargado = $('#encargado').val();
		$.ajax({
			url: '../Controller/ProductoController1.php?page=3',
			type: 'post',
			data: {'encargado':encargado},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#txt_cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});






	
	$(".guardar-carrito").off("click");
	$(".guardar-carrito").on("click", function(e) {
		$.ajax({
			url: '../Controller/ProductoController1.php?page=3',
			type: 'post',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#txt_cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});
	
});