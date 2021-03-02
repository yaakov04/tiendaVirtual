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

    public function levantarReclamo($id){
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO reclamos (usuario_id) VALUES (?) ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $respuesta=$stmt->insert_id;
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;
    }

    public function getNombreUsuario($id){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT nombre, apellido, email FROM `usuarios` WHERE id = $id ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//

    public function guardarMensaje($datos){
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO mensajes (id_reclamo, id_venta, id_pedido, nombre, correo, asunto, mensaje) VALUES (?,?,?,?,?,?,?) ");
            $stmt->bind_param("iiissss", $datos['id_reclamo'], $datos['id_venta'], $datos['id_pedido'], $datos['nombre'], $datos['correo'], $datos['asunto'], $datos['mensaje']);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                $respuesta='exito';
            }else{
                $respuesta='error';
            }
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;
    }//

    public function cambiarEstadoReclamo($id_venta){
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" UPDATE `ventas` SET `estatus` = 6 WHERE `ventas`.`id` = ? ");
            $stmt->bind_param("i", $id_venta);
            $stmt->execute();
            if ($stmt->affected_rows==1) {
                $respuesta = 'exito';
            }else{
                $respuesta= 'error';
            }
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;
    }


}//class