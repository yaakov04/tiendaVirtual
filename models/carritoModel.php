<?php
class CarritoModel{
    public function __construct(){

    }


public function getDatosAddCarrito($idArticulo){
    //nombre
    //imag
    //precio
    
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT id, nombre_producto, img_producto, precio FROM `productos` WHERE id = $idArticulo ";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
    return $resultado;
}
      



}//class