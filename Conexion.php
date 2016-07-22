<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conexion
{
    private $server = "192.168.0.4";
    
    function conectar()
    {
        $connectionInfo = array("UID"=>  'icgadmin',"PWD"=>  'masterkey',"Database"=>  'SC');
        return sqlsrv_connect($this->server, $connectionInfo);
    }
    function consulta($sql,$param)
    {
        $conexion = $this->conectar();
        $stmt = sqlsrv_query( $conexion, $sql,$param);
        return  sqlsrv_fetch_array($stmt);
    }
}
?>