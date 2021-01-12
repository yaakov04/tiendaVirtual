<?php
class MainModel{
    public function __construct(){

    }
public function getNovedades(){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT id, nombre_producto, img_producto, precio FROM `productos` ORDER BY editado DESC LIMIT 4";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}

      

public function test(){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT * FROM `productos` WHERE id = 1";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}

}//class