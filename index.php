<?php
if (!isset($_SESSION)) {session_start();}

$_SESSION['detalle'] = array();
//$_SESSION['detalle1'] = array();
date_default_timezone_set('America/La_Paz');		
$hoyx = date('Y-m-d');
$mes=date("m", strtotime($hoyx));  
$dia=date("d", strtotime($hoyx));  
$ano=date("Y", strtotime($hoyx));  

require_once 'Config/conexion.php';
require_once 'login/Model/ProductoDelivery.php';

$objProducto = new Producto1();
$grux = $objProducto->getGrupo();	
$sucx = $objProducto->getSucursal();	


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacutebado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 



?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Delivery | LP</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>-->
	
	<script src="js/jquery-2.1.4.min.js"></script>

	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.magnific-popup.js"></script>

	<!--//tags -->
	<script src="js/bootstrap.js"></script>
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
	
<!--    <script src="login/js/myjavaProductos.js"></script>-->
	
	<script src="login/js/myjavaDelivery2.js"></script>
	
	
<!-- Alertyfy -->
	<link rel="stylesheet" href="login/libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="login/libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="login/libs/js/alertify/lib/alertify.min.js"></script>
<!-- Alertyfy -->
	
	<style type="text/css">
		ul.ui-autocomplete {
    	z-index: 1100;
		}
	</style>

</head>

<body>
	
<?php

?>	
	<!-- top-header -->
	<div class="header-most-top">
		<p>PROYECTO SISTEMAS 3</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>T</span>iti
						<span>D</span>elivery
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 65569468
					</li>
					<li>
						<a href="login/acceso.php" >
							<span class="fa fa-unlock-alt" aria-hidden="true"></span>Acceso a afiliados </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Registro VIP </a>
					</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
<!--					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Como podemos ayudarte?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
-->				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
	<!--	<div class="select-city">
			<h3>Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
				
				<optgroup label="Wyoming">
					<option>Cheyenne</option>
					<option>Casper</option>
					<option>Laramie</option>
					<option>Gillette</option>
					<option>Rock Springs</option>
				</optgroup>
			</select>
			<div class="clearfix"></div>
		</div>-->
	</div>
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Administrador </h3>
						<p>
							Area restringida para el Administrador
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Credenciales</a>
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nombre" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Contraseña" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	
	
	<div class="modal fade" id="carrito-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">NOTA DE PEDIDO </h3>
						<p>
							Se Agrego satisfactoriamente puede Continuar
<!--							<a href="#si.php" data-toggle="modal" data-target="#myModal2">
								Puede  continuar</a>
-->						</p>
							<div class="detalle-producto"></div>
						<?php //echo $_SESSION['items'];
						//echo $_SESSION['total'];
						?>

<!--						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nombre" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Contraseña" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
-->						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //carrito modal -->

	
	
	
	
	<div class="modal fade" id="carrito-ingre" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">DESCRIPCION </h3>
<!--						<p>
							<a href="#si.php" data-toggle="modal" data-target="#myModal2">
								Puede  continuar</a>
						    </p>
-->							<div class="agrega-ingre"></div>
						<?php //echo $_SESSION['items'];
						//echo $_SESSION['total'];
						?>

<!--						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nombre" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Contraseña" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
-->						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //carrito modal -->

	
	
	
	
	
	
	
	
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">REGISTRE</h3>
						<p>
							Para tenerlo en nuestra lista de clientes VIP REGISTRESE por favor.
						</p>
						<form id="formreg">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nombre" name="nomb" required="">
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Direccion" name="pass" required="">
							</div>
							
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Celular" name="cel" required="">
							</div>
							
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="mail" required="">
							</div>
							<input type="submit" value="Registrar">
						</form>
						<p>
<!--							<a href="#">By clicking register, I agree to your terms</a>
-->						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
	
			</div>

			
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="index.php">Inicio
										<span class="sr-only">(current)</span>
									</a>
								</li>
								
<!--								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu Variado
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Bakery</a>
													</li>
													<li>
														<a href="product.html">Baking Supplies</a>
													</li>
													<li>
														<a href="product.html">Coffee, Tea & Beverages</a>
													</li>
													<li>
														<a href="product.html">Dried Fruits, Nuts</a>
													</li>
													<li>
														<a href="product.html">Sweets, Chocolate</a>
													</li>
													<li>
														<a href="product.html">Spices & Masalas</a>
													</li>
													<li>
														<a href="product.html">Jams, Honey & Spreads</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Pickles</a>
													</li>
													<li>
														<a href="product.html">Pasta & Noodles</a>
													</li>
													<li>
														<a href="product.html">Rice, Flour & Pulses</a>
													</li>
													<li>
														<a href="product.html">Sauces & Cooking Pastes</a>
													</li>
													<li>
														<a href="product.html">Snack Foods</a>
													</li>
													<li>
														<a href="product.html">Oils, Vinegars</a>
													</li>
													<li>
														<a href="product.html">Meat, Poultry & Seafood</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
-->								
								
								
								
								
<!--								<li class="">
									<a class="nav-stylehead" href="faqs.html">Faqs</a>
								</li>
-->								
								
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Inicio</a>
						<i>|</i>
					</li>
					<li>TITI DELIVERY</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Menu :
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					

					
				</span><span><?php echo ''.$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; ?></span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
			<!--	<div class="search-hotel">
					<h3 class="agileits-sear-head">Buscar Ahora..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Producto..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>-->
				<!-- price range -->
	<!--			<div class="range">
					<h3 class="agileits-sear-head">Rango Precio</h3>
					<ul class="dropdown-menu6">
						<li>
							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>-->
				<!-- //price range -->
				<!-- food preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">FILTRAR DATOS</h3>
					<ul>
						<li> 
							<form>

								<select id="agileinfo-nav_search" name="agileinfo_search" required="" class="csucux">
			<!--				<select name="cla" id="cla" class="form-control" >
			-->				 	<option value="0">Sucural</option>
								<?php foreach($sucx as $dato1):?>
								<option value="<?php echo $dato1['codsuc']?>"><?php echo $dato1['detsucursal']?></option>
								<?php endforeach;?>
							</select>
							</form>
						</li>

						<li> 
							<form>

								<select id="agileinfo-nav_search" name="agileinfo_search" required="" class="cgrux">
			<!--				<select name="cla" id="cla" class="form-control" >
			-->				 	<option value="0">Categoria</option>
								<?php foreach($grux as $da):?>
								<option value="<?php echo $da['codgru']?>"><?php echo $da['detgrupo']?></option>
								<?php endforeach;?>
							</select>
							</form>
						</li>
						
						
<!--						<li>
							<input type="checkbox" class="checked">
							<span class="span">Vegetariana</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">No-Vegetariana</span>
						</li>
-->					</ul>
				</div>
				<!-- //food preference -->
				<!-- discounts -->
				<!-- //discounts -->
				<!-- reviews -->
				<div class="customer-rev left-side">
					<h3 class="agileits-sear-head">Preferencia</h3>
					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- //reviews -->
				<!-- cuisine -->
				<!-- //cuisine -->
				<!-- deals -->
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
						
						
						
						
						
						
				<!--//inicio agrega-registro-->		
				<div id="agrega-registros" ></div>
<!--               	<center class="site-pagination"> 
                        <ul class="pagination" id="paginando"></ul>       
               	</center>
-->				<!--//fin agrega-registro-->

						
						<div class="clearfix"></div>
				
						
					</div>
					<!-- //first section -->

<a href="checkout.php" class="btn btn-danger" role="button" id="botti2">COMPLETAR PEDIDO</a>
	<hr>
<a href="javascript:AnularPedido();" class="btn btn-success" role="button" id="botti3">ANULAR PEDIDO</a>

				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	
	

		<!-- //oferta especial -->

	
	
	<!-- newsletter -->
	
	<!-- //newsletter -->
	<!-- footer -->
	
	<!-- //footer -->
	<!-- copyright -->
	
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	
	<!--<script src="js/jquery-2.1.4.min.js"></script>-->
	
	
	
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<!--<script src="js/jquery.magnific-popup.js"></script>-->
	
	
	
	
	<!--<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>-->
	
	
	
	
	
	
	
	
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<!--<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render();

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>-->
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<!--<script src="js/jquery-ui.js"></script>-->
	
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<!--<script src="js/jquery.flexisel.js"></script>-->
<!--	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>-->
	<!-- //flexisel (for special offers) -->

	<!-- smoothscroll -->
<!--	<script src="js/SmoothScroll.min.js"></script>
-->	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
<!--	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
-->	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
<!--	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
-->	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<!--<script src="js/bootstrap.js"></script>-->
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>