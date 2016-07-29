<?php
    session_start();
    if(isset($_SESSION['user'])){
    // Le doy la bienvenida al usuario.
        include './Conexion.php';
        $obj = new Conexion();
        $user = ($_SESSION['user']);
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
         //GUARDO LOS DATOS EN UN ARREGLO EVITAR INYECCION SQL

        if ($password == $repassword) {
            $password = md5($password);
            $params = array($password,$user);
            $tsql = "UPDATE DBO.portalUsuarios SET PASS = ?,ENCRIPTA = 'T' WHERE USUARIO = ?";
            $row = $obj->consulta($tsql,$params);
            header("HTTP/1.1 302 Moved Temporarily");
            header("Location: principal.php");
        } else {
            echo 'Las contraseñas no son iguales <a href="update_user.php">vuelva a intenarlo</a>.<br/>';
        }
    }else{
    // Si no está logueado lo redireccion a la página de login.
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: index.html");
    }
    
    // Obtengo los datos cargados en el formulario de login.
        
    /*
    
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
     * 
     */
 
?>
