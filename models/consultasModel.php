<?php
class consultasModel{
    public function __construct(){

    }
    public function getNovedades(){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT id, nombre_producto, img_producto, precio FROM `productos` ORDER BY fecha_registro DESC LIMIT 16";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function getMasVendidos(){
        try{
            require 'config/conexion_bd.php';
            //SELECT id_producto, SUM(cantidad) as total_cantidad FROM pedidos GROUP BY id_producto ORDER BY total_cantidad DESC LIMIT 4
            $sql= " SELECT pedidos.id_producto as id, SUM(pedidos.cantidad) as total_cantidad,productos.nombre_producto, productos.img_producto, productos.precio FROM pedidos INNER JOIN productos ON pedidos.id_producto = productos.id GROUP BY id_producto ORDER BY total_cantidad DESC LIMIT 8 ";
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
            $sql= " SELECT id, nombre_producto, img_producto, precio FROM `productos` WHERE oferta = 1 ORDER BY editado DESC LIMIT 8";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//

    public function getbusqueda($buscar){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT productos.id as id, productos.nombre_producto, productos.img_producto, productos.precio  FROM productos INNER JOIN categorias ON productos.categoria = categorias.id  WHERE productos.nombre_producto LIKE '%".$buscar."%' OR productos.descripcion_producto LIKE '%".$buscar."%' OR categorias.categoria LIKE '%".$buscar."%' ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }
}