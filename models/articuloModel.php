<?php
class articuloModel{
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

public function mostrarArticulo($id){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT * FROM `productos` WHERE id = $id";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}
      



}//class