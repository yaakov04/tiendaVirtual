<?php
class MainModel{
    public function __construct(){

    }
    public function getNovedades(){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT id, nombre_producto, img_producto, precio FROM `productos` ORDER BY fecha_registro DESC LIMIT 4";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function getMAsVendidos(){
        try{
            require 'config/conexion_bd.php';
//            SELECT id_producto, SUM(cantidad) as total_cantidad FROM pedidos GROUP BY id_producto ORDER BY total_cantidad DESC LIMIT 4
            $sql= " SELECT pedidos.id_producto, SUM(pedidos.cantidad) as total_cantidad,productos.nombre_producto, productos.img_producto, productos.precio FROM pedidos INNER JOIN productos ON pedidos.id_producto = productos.id GROUP BY id_producto ORDER BY total_cantidad DESC LIMIT 4 ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function getOfertas(){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT id as id_producto, nombre_producto, img_producto, precio FROM `productos` WHERE oferta = 1 ORDER BY editado DESC LIMIT 4";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//

}//class