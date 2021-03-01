<?php
class reclamoModel{
    public function __construct(){

    }

    public function getUsuarioVenta($usuario_id, $venta_id){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT id FROM `ventas` WHERE id_cliente = $usuario_id AND id = $venta_id ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//
    public function getVentaPedido($venta_id, $pedido_id){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT id FROM `pedidos` WHERE id_venta = $venta_id AND id = $pedido_id ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//

    
      



}//class