<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
//$nombresuc=$_SESSION['nomb_suc'];
//$nomdepto=$_SESSION['nomdepto'];

//$nousuario=$_SESSION['nomb_usu'];
//$idper=$_SESSION['id_per'];
//$fotito= $usu['fotousu'];

require_once '../../Config/conexion.php';
require_once '../Model/Producto.php';


$objProducto = new Producto();
//$re = $objProducto->getpersonas($idper);
//
//		foreach($re as $usu):
//			$fotito= $usu['foto'];
////			$id_usu= $usu['id_usu'];
////			$codde=$usu['coddep'];
//		endforeach;


//PERSONAS
$pper = $objProducto->getpersonal2020();
$sucur = $objProducto->getSucursal();

//CLASIFICACION
//$categoria = $objProducto->getCategoria();
//estado
//$sucur = $objProducto->getSucursal();
//$depar = $objProducto->getDepartamento();

//compra
//$compra = $objProducto->getcompra();


// $foto = $objProducto->getById($id);
//$fotito=1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="shortcut icon" href="../recursos/nut1.ico" type="image/x-icon" />

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap + Jquery.js -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../js/script/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap -->

<!-- Jquery-iu  JS CSS -->
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
       
		
        <script type="text/javascript" src="../js/script/jqueryui.js"></script>
<!-- Jquery-iu  JS CSS -->

<!-- Alertyfy -->
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
<!-- Alertyfy -->

<!-- JS JAVAS PERSONALIZADO -->
<script src="../js/myjavaUu2.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.cab {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}

</style>


</head>

<body>
<div class="container-fluid"> <!-- container -->
<div class="row"> 

<div class="col-sm-4 hidden-xs" style="background-color:white;">
<img src="../recursos/logintit.png" width="50" height="50">
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h3>USUARIOS DEL SISTEMA</h3></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:white;">


<table border="0" width="100%" class="table cab"><tr><td width="50%" align="right" class="hidden-xs"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50px" height="50px"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u; ?>
</td></tr>
</table>


</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->



<div class="row"> <!-- nav bar -->
<div class="col-sm-12" style="background-color:white;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

      <a class="navbar-brand" href="a_principal.php">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="z_inicio1.php"><span class="glyphicon glyphicon-home"> </span> Salir</a></li>-->
        
      </ul>
        <button  id="nuevo-usuario" class="btn btn-danger navbar-btn btn-sm"> <span class="glyphicon glyphicon-plus"></span> Nuevo</button>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div><!-- nav bar -->


<div class="row"><!-- row AA --> 
<div class="col-sm-10 table-responsive" style="background-color:white;">

<div class="registros" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> <!-- fin col-sm-10 -->
</div> <!-- row AA -->

</div><!-- container -->




    <!-- MODAL USUARIOS ORIGINAL-->
    <div class="modal fade" id="usuarios-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>USUARIOS</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idusux" name="idusux" />
					<input type="hidden"   id="cdp" name="cdp" />
                   	<input type="hidden" required readonly id="pro" name="pro"/>
                   	<input type="hidden" required readonly id="csuc" name="csuc" value="<?php echo $codsucx;?>" />


				<div class = "form-group">
      			<label for = "iidper" class="control-label col-xs-3 titi">ASIGNAR A :</label>
                <div class="col-xs-7" >
					<select name="iidper" id="iidper" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($pper as $per):?>
						<option value="<?php echo $per['id_per']?>"><?php echo $per['nombreper']?></option>
						<?php endforeach;?>
					</select>

   				</div>
                </div>
				

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="usua">Usuario :</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" id="usua" name="usua" required placeholder="Usuario ">
                    </div>
    			</div>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pass">Pasword :</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" id="pass" name="pass" required placeholder="Password">
                    </div>
    			</div>
                

				<div class = "form-group">
      			<label for = "usu" class="control-label col-xs-3 titi">Tipo Usuario:</label>
                <div class="col-xs-5" >
					<select name="tiu" id="tiu" class="form-control" >
 	    	            <option value="0">Ninguno</option>
            			<option value="adm">Administrador</option>
            			<option value="caja">Cajera</option>

					</select>

   				</div>
                </div>



              
                
                        	<div id="mensaje"></div>
            </div>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    



<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN PERSONAL</h4>
				</div>
				<!--header cuerpo -->
					<div class="modal-body img-responsive" id="espacio-foto"> </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
					
				</div>
			</div>
		</div>

</div>     
<!-- fin foto -->

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalcargafoto" data-backdrop="static", data-keyboard="true">

		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">PERSONAL IMAGEN</h4>
				</div>
				<!--header cuerpo -->
					<div class="modal-body img-responsive" id="espacio-carga" >
                    
                    </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>
		</div>
</div>
<!-- fin foto -->






</body>
</html>
