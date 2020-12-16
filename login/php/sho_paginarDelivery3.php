<?php
if (!isset($_SESSION)) {session_start();}


include('conexion.php');

$cgrux = $_POST['cgrux'];
//$csucux = $_POST['csucux'];
$codsucx=$_SESSION['codsuc21'];

$registro = mysqli_query($conexion,"SELECT * FROM menuu WHERE blkme='SI' AND codgru='$cgrux' AND codsuc='$codsucx' ");

		while($registro2 = mysqli_fetch_array($registro)){
			$pp=$registro2['precio'];
			$cm=$registro2['codme'];

			echo '<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="'.$registro2['fotome'].'" width="170px" height="150px" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="javascript:VerIngredientes('.$registro2['codme'].');" class="link-product-add-cart"> Ingredientes</a>
										</div>
									</div>
									<span class="product-new-top">Elija</span>
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="#single2.html">'.$registro2['detmenu'].'</a>
									</h4>
									
									
									<div class="info-product-price">
										<span class="item_price ">'.$registro2['precio'].'</span>
										
										
										
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										
									
										<a href="javascript:AgregarDelivery('.$registro2['codme'].');" class="btn btn-info glyphicon glyphicon-plus mm" role="button" id="botti"> AGREGAR</a>

										
									</div>

								</div>
							</div>
						</div>';
			
			
	
		}
        


  //  $array = array(0 => $tabla,
//    			   1 => $lista);
//    echo json_encode($array);

?>
