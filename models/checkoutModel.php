<?php
class checkoutModel{
    public function __construct(){

    }//

    public function getDatosClientes($id_cliente){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT nombre, apellido, calle, numero, ciudad, pais, cp  FROM `usuarios` WHERE id = $id_cliente ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//
    public function getDatosArticulos($idArticulo){
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
    }//
      



}//class