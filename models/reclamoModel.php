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

    public function responderMensaje($datos){
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO mensajes (id_reclamo, id_venta, id_pedido, nombre, asunto, mensaje, correo) VALUES (?,?,?,?,?,?,?) ");
            $stmt->bind_param("iiissss", $datos['id_reclamo'], $datos['id_venta'], $datos['id_pedido'], $datos['nombre'],  $datos['asunto'], $datos['mensaje'], $datos['correo']);
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
    }

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
    }//

    public function getReclamos($id){
        try{
            require 'config/conexion_bd.php';
            $sql=" SELECT mensajes.id_pedido as pedido, mensajes.asunto as asunto, mensajes.id_reclamo as reclamo, mensajes.id_venta, reclamos.resuelto as resuelto, mensajes.fecha as fecha FROM mensajes ";
            $sql.= " INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id ";
            $sql.=" WHERE usuario_id = $id ORDER BY fecha ASC";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }
    public function validarReclamo($id){
        try{
            require 'config/conexion_bd.php';
            $sql=" SELECT id FROM reclamos WHERE id = $id AND usuario_id = ".$_SESSION['id'];
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getReclamo($id){
        try{
            require 'config/conexion_bd.php';
            $sql=" SELECT mensajes.id as id_mensaje,mensajes.id_pedido as pedido, mensajes.nombre as nombre, mensajes.correo as correo, mensajes.asunto as asunto, DATE(mensajes.fecha) as fecha, mensajes.leido as leido, mensajes.id_venta as venta, mensajes.mensaje as mensaje, mensajes.id_reclamo as reclamo, reclamos.resuelto as resuelto FROM mensajes ";
            $sql.= " INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id ";
            $sql.=" WHERE mensajes.id_reclamo =".$id. " AND reclamos.usuario_id =". $_SESSION['id'];
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//

    public function hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT mensajes.id as id_mensajes, reclamos.id as id_reclamos FROM  `mensajes` INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id WHERE mensajes.id_reclamo = $reclamos_id AND mensajes.id_venta = $venta_id AND mensajes.id_pedido = $pedido_id AND mensajes.id = $respuesta_mensaje AND reclamos.usuario_id = ".$_SESSION['id'];
            $resultado = $conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//


}//class