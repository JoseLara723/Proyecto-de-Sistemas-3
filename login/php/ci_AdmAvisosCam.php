
<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];

$fecha=date("Y-m-d");

//$nombresuc=$_SESSION['nomb_suc'];
//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location:../index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuarios'){
//		header('Location: a_usuario.php');
//	}else{
//		$usuarios=$_SESSION['usuario'];
//		$id_usu= $_SESSION['id_usu'];
//		$nombre_u= $_SESSION['nomb_usu'];
//		//$coddepx= $_SESSION['depto'];
//		$idper=$_SESSION['id_per'];
//			//	$nomdepto=$_SESSION['nomdepto'];
//
//	}
//}


require_once '../../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();


$depto = $objProducto->getDepto();
$pais = $objProducto->getPais();
$clax = $objProducto->getClase();
$provix = $objProducto->getProvincia();

//$re = $objProducto->getpersonas($idper);
//		foreach($re as $usu):
//			$fotito= $usu['foto'];
////			$id_usu= $usu['id_usu'];
////			$codde=$usu['coddep'];
//		endforeach;
//
//// $foto = $objProducto->getById($id);
////$depto = $objProducto->getdeptounico($coddepx);
//$umx = $objProducto->getUmed();
//$provx = $objProducto->getProveedor();
//$grupox = $objProducto->getClasifica();
//$grupx2 = $objProducto->getGrupo();

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>ADMIN</title>
<link rel="shortcut icon" href="../recursos/sisadal.ico" type="image/x-icon" />
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
<script src="../js/myjavaCam.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}
.tipe {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #b33c0d;
}

	ul.ui-autocomplete {
    z-index: 1100;
}

 </style>
</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4 hidden-xs" style="background-color:white;"> 
        <table class="table"><tr><td align="left"><img src="../recursos/logo1.png" class="img-responsive" width="50px" height="50px" alt="lebrai"></td>
        </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h4>CAMBALACHE</h4></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 hidden-xs" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<br>

<div class="row">
<div class="col-sm-12">
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
<!--        <li class="active"><a href="z_inicio1.php"><span class="glyphicon glyphicon-home"></span> Salir</a></li>
-->      </ul>
    <form class="navbar-form navbar-left">


      <!--<div class="input-group">
        <input type="text" class="form-control" id="bs-prod" placeholder="Buscar">
        <div class="input-group-btn">
          <button class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>-->
<hr class="hidden-lg hidden-md hidden-sm">
      <!--<button id="nuevo-producto" type="button" class="btn btn-warning  btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>-->
<!--      <a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">a PDF</a>
      <a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">a Excel</a>
-->    </form>
      
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Cerrrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>

<br>
    
<div class="row">    
    
<div class="col-sm-12 ">    
<div class="registros table-responsive" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</div> <!-- fin col-sm-12 -->
	
</div> <!-- fin row -->
 
</div> <!-- fin container -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-artis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario</b></h4>
            </div>
            
            
            
            
            
<form id="formulario" class="credit-card-div" onsubmit="return agregaRegiss();">
<div class="panel panel-default" >
 	<div class="panel-heading">
<input type="hidden"  class="form-control input-sm" id="pro" name="pro"  />
<input type="hidden"  class="form-control input-sm" id="idar" name="idar"  />
<input type="hidden"  class="form-control input-sm" id="codduex" name="codduex"  />

     <div class="row">
              	<div class="col-md-6 apagar">
                  <span class="help-block text-muted small-font" >Titulo del Aviso:</span>
                  <input type="text"  class="form-control input-sm" id="descri" name="descri" required  placeholder="Tutulo del Aviso" />
              	</div>
              	<div class="col-md-6 apagar">
                  <span class="help-block text-muted small-font" >Zona:</span>
                  <input type="text"  class="form-control input-sm" id="zon" name="zon" required  placeholder="Zona" />
              	</div>
	 </div>
    

     <div class="row">

         		<div class="col-md-3">
                  <span class="help-block text-muted small-font" > Moneda:</span>
                	<input type="radio"  name="monn" CHECKED id="mo1" value="DO">Dolares
					<input type="radio"  name="monn" id="mo2" value="BS"> Bolivianos

              	</div>
		 
              	<div class="col-md-3">
                  <span class="help-block text-muted small-font" > Precio :</span>
                  <input type="text" class="form-control input-sm" id="pre" name="pre" placeholder="Precio en $us" />
              	</div>

		 		<div class="col-md-6">
                  <span class="help-block text-muted small-font" >  Nombre del Propietario:</span>
                  <input type="text" class="form-control input-sm" id="dueno" name="dueno" required placeholder="Nombre Propietario" />
              	</div>
      </div>

     <div class="row">
              	<div class="col-md-6 apagar">
                  <span class="help-block text-muted small-font" >Direccion:</span>
                  <input type="text"  class="form-control input-sm" id="dire" name="dire" required  placeholder="Direccion" />
              	</div>
          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" >  No de Carnet:</span>
                  <input type="text" class="form-control input-sm" id="ci" name="ci" required placeholder="No Carnet" />
              	</div>
          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" >  Cel/Telf:</span>
                  <input type="text" class="form-control input-sm" id="cel" name="cel" required placeholder="Telefono o Celular" />
              	</div>
                
                
	 </div>
		
		


    

    <div class="row">

          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" >  Departamento:</span>
                		<select name="codep" id="codep" class="form-control" >
                 		<option value="0">Ninguno</option>
                    	<?php foreach($depto as $dato1):?>
                		<option value="<?php echo $dato1['coddep']?>"><?php echo $dato1['descripdepto']?></option>
                    	<?php endforeach;?>
                    	</select>
              	</div>
          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" >  Provincia:</span>
                		<select name="codpvi" id="codpvi" class="form-control" >
                 		<option value="0">Ninguno</option>
                    	<?php foreach($provix as $dato3):?>
                		<option value="<?php echo $dato3['codprov']?>"><?php echo $dato3['descripprovi']?></option>
                    	<?php endforeach;?>
                    	</select>
              	</div>
		
          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" > Publicado:</span>
                  <input type="date" readonly class="form-control input-sm" id="ferg" name="ferg" />
              	</div>
		 
          		<div class="col-md-3">
                  <span class="help-block text-muted small-font" >  Vence:</span>
                  <input type="date" class="form-control input-sm" id="fven" name="fven" />
              	</div>
		
      </div>   
      
      
     <div class="row">
                
         		<div class="col-md-3">
                  <span class="help-block text-muted small-font" > Habilitado:</span>
                	<input type="radio"  name="hax" CHECKED id="ha1" value="SI">SI
					<input type="radio"  name="hax" id="ha2" value="NO"> NO
              	</div>
		 
              	<div class="col-md-3">
                  <span class="help-block text-muted small-font" > No Consultas:</span>
                  <input type="number" class="form-control input-sm" id="nconsul" name="nconsul" placeholder="No Consultas" />
              	</div>
      </div>
      

      		
      
      
      
               
             <div class="row ">
          		<div class="col-md-3">
                 <span class="help-block text-muted small-font" ></span>
                 	<input type="submit" value="EDITAR DATOS" class="btn btn-success" id="reg"/>
              	</div>

     		</div>


	</div>
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
					<h4 class="modal-title">IMAGEN </h4>
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
					<h4 class="modal-title">SUBIR IMAGEN</h4>
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
    
</div> <!-- fin container -->

<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
