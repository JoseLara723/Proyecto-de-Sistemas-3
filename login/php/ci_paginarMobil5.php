<?php
if (!isset($_SESSION)) {session_start();}

	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM menuu WHERE blkme='SI' "));
    $nroLotes = 5;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';
	if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:paginar('.($paginaActual-1).');">Ant</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:paginar('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:paginar('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:paginar('.($paginaActual+1).');">Sigui</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion,"SELECT * FROM menuu WHERE blkme='SI' LIMIT $limit, $nroLotes ");

		while($registro2 = mysqli_fetch_array($registro)){
			$pp=$registro2['precio'];
			$cm=$registro2['codme'];

			$tabla = $tabla.'<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="'.$registro2['fotome'].'" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single2.html" class="link-product-add-cart"> Ingredientes</a>
										</div>
									</div>
									<span class="product-new-top">Nuevo</span>
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="#single2.html">'.$registro2['detmenu'].'</a>
									</h4>
									
									
									<div class="info-product-price">
										<span class="item_price ">'.$registro2['precio'].'</span>
										
										
										
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										
										<button type="button" class="btn btn-lg btn-success btn-agree " codx="'.$cm.'" id="botti"><span class="glyphicon glyphicon-plus"></span> Agregar </button>

										
									</div>

								</div>
							</div>
						</div>';
			
			
	
		}
        


    $array = array(0 => $tabla,
    			   1 => $lista);
    echo json_encode($array);

?>
