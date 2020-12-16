<?php
if (!isset($_SESSION)) {session_start();}

require_once '../../Config/conexion.php';
require_once '../Model/Producto.php';
date_default_timezone_set('America/La_Paz'); 


if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	
			echo '<Script language=javascript> 
			alert("ACCESO NO PERMITIDO DEBE LOGEARSE...")
			self:location="../../index.php"	
			</script>';
}else{
	
	if ($_SESSION['id_area'] == 'admin') {
					echo '<Script language=javascript> 
					self:location="a_principal.php"	
					</script>';
				//header('Location:z_inicio3.php');
			} elseif ($_SESSION['id_area'] == 'caja') {
					echo '<Script language=javascript> 
					self:location="sho_caja.php"	
					</script>';
				//header('Location:z_inicio4.php');
			} elseif ($_SESSION['id_area'] == 'supervisor') {
					echo '<Script language=javascript> 
					self:location="a_supervisor.php"	
					</script>';
				//header('Location:z_inicio4.php');

			}else{
		
					$usuarios=$_SESSION['usuario'];
					$objusu= new	Producto(); //consulta a codnu
					$usuario= $objusu->getusu($usuarios);
					foreach($usuario as $usu):
						$nombre_u= $usu['nomb_usu'];
						$id_usu= $usu['id_usu'];
					endforeach;
			}
}


?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8 />

<title>Delivery</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


  	<script src="../js/jquery.js"> </script>
	<script src="../js/myjavaturno.js"></script>
    
<style type="text/css">

#cuadro {
	background-color: #CFC;
	height: 105px;
	width: 41px;
	margin: 2px;
	float: left;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #000;
}
#cuadro .badge {
	font-size: 10px;
	background-color: #000;
}
#cuadro .numero {
	font-size: 12px;
	background-color: #000;
}
#cuadro .dispo {
	font-size: 12px;
	background-color: #0b3a06;
}

#cuadro a .glyphicon.glyphicon-user {
	font-size: 18px;
	color:#FFF;
}
#cuadro .glyphicon.glyphicon-info-sign {
	font-size: 15px;
	color:#FFF;
}
body {
	background-color: #CCC;
    background-image: url(../recursos/fondo_adm2.jpg);
}
.col-md-8.medio {
	text-align: center;
	background-color: #29282b;
	font-family: Arial, Helvetica, sans-serif;
	color: #fdf9f9;
}

.nav.nav-tabs.navbar-inverse {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #CF0;
}
body,td,th {
	font-size: 14px;
}
</style>

</head>




<body>

<div class="container-fluid">
<div class="row">
	<div class="col-md-2 hidden-xs"><!--Column left-->
    <img src="../recursos/logo1.jpg" class="img-responsive" width="100px" height="100px" >
	</div>
	<div class="col-md-8 medio"><!--Column left-->
    <h2>TITI DELIVERY</h2>


   <label>Bienvenido : <?php echo $nombre_u; ?></label><br>
<h4 align="center" class="fecha">  <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "".$array[date("w")]." ".date("d-m-y"); ?> </h4>
    
    
	</div>
   	<div class="col-md-2 hidden-xs"><!--Column left-->
    <img src="../recursos/logo1.jpg" class="img-responsive" alt="www.raulwebnet.com" width="100px" height="100px">
	</div>
</div> <!--fin row -->




<div class="row">
<div class="col-md-12">
<br>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">DATOS GENERALES</a></li>-->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">DATOS GENERALES <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sho_menuu.php">PRODUCTOS</a></li>
            <li><a href="sho_grupos.php">CATEGORIAS</a></li>
          </ul>
        </li>

		  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MOVIMIENTOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sho_aprobaru.php">PEDIDOS</a></li>
			  <!--<li><a href="sho_caja.php">DEPOSITOS A CAJA</a></li>-->
			  <li><a href="sho_gastosu.php">GASTOS</a></li>
			  
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">REPORTES <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sho_Ventasdiau.php">GANANCIAS </a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">USUARIOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ci_personalu.php">PERSONAL</a></li>
 	        <li><a href="ci_usuarios_admu.php">USUARIOS</a></li>
            <li><a href="sho_motoquerosu.php">REPARTIDORES</a></li>
			  

          </ul>
        </li>
<!--        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
-->      
		</ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>


    
</div>
</div> <!--fin row-->
<br>



<div class="row">
<div class="col-md-12">

<?php
$objgrupos = new Producto();
$grupos = $objgrupos->getgrupo();


//$habitaciones= $objhabita->getmaster();
?>





</div> <!-- fin col-md-12-->
</div> <!-- fin row -->

</div> <!-- fin container -->


<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
