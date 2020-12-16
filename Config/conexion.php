<?php
global $cnx;
$manejador="mysql";
$servidor="localhost";
$usuario="root";
$pass="";
$base="bddelivery";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);
?>
