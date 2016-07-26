<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once './Conexion.php';

if(isset($_POST['btn-login']))
{
    $user = $_POST['username'];
    $password = $_POST['password'];
    
    $params = array($user, $password); //GUARDO LOS DATOS EN UN ARREGLO EVITAR INYECCION SQL
    
    $tsql = "SELECT DBO.Fn_PORTALUSUARIOS(?,?)";

    $row = $obj->consulta($tsql,$params);
   
    if($row[0] == "1"){
    // Guardo en la sesión el user del usuario.
        echo '1';
        $_SESSION['user'] = $user;
        // Redirecciono al usuario a la página principal del sitio.
        //header("HTTP/1.1 302 Moved Temporarily");
        //header("Location: principal.php");
    }else{
        echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
    }
}

?>