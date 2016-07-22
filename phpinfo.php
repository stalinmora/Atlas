<?php
include './Conexion.php';

$obj = new Conexion();
 
/* Query que nos mostrara el usuario con el que nos hemos conectado a la base de datos. */
$params = array('0924252075', '0924252075');
$tsql = "SELECT DBO.Fn_PORTALUSUARIOS(?,?)";

$row = $obj->consulta($tsql,$params);

//echo "User login: ".implode(" ",$row)."</br>"; Array a String
echo "User login: ".$row[0]."</br>";

?>

