<?php
class cuentaModel{
    public function __construct(){

    }


public function tenerDatosUser($id){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT * FROM `usuarios` WHERE id = $id";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}


      



}//class