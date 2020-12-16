<?php
if (!isset($_SESSION)) {session_start();}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RAOS</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<link href="css/estilo2.css" rel="stylesheet">

</head>
<body>
<div class="login" align="center">
    	<h4>ACCESO A DATOS</h4>
<form method="post" action="colocar_en_cero.php" class="form" >
<div class="form-group">
<label class="control-label col-xs-3 titi" for="sena">Password:</label>
<div class="col-xs-3">

<input type="password" class="form-control" id="sena" name="sena" required placeholder="Password">
 </div>
</div>
<br>
<input type="submit" value="Enviar" />
</form>

</div>
    
    
    
    
    
    
	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
