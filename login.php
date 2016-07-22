<?php
  
    session_start();
    include './Conexion.php';
    $obj = new Conexion();
 
    // Obtengo los datos cargados en el formulario de login.
    $user = $_POST['username'];
    $password = $_POST['password'];
  
    $params = array($user, $password); //GUARDO LOS DATOS EN UN ARREGLO EVITAR INYECCION SQL
    
    $tsql = "SELECT DBO.Fn_PORTALUSUARIOS(?,?)";

    $row = $obj->consulta($tsql,$params);
   
    if($row[0] == "1"){
    // Guardo en la sesión el user del usuario.
        $_SESSION['user'] = $user;
    // Redirecciono al usuario a la página principal del sitio.
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: principal.php");
    }else{
        echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
  }
 
?>
