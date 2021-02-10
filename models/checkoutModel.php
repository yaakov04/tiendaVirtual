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
    public function insertarVenta($datos){
        $datos_envio=$datos['datos_envio'];
        $destinatario =$datos['destinatario'];
        $status=$datos['status'];
        $total=$datos['total'];
        $id_cliente=$_SESSION['id'];
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO ventas (id_cliente,destinatario,datos_envio,estatus,total) VALUES(?,?,?,?,?) ");
            $stmt->bind_param("issis", $id_cliente, $destinatario, $datos_envio, $status, $total);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                $respuesta=array(
                    'respuesta'=>'exito',
                    'id'=>$stmt->insert_id
                );
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
    public function insertarPedido($datos){
        /*
        id_venta, id_producto, cantidad, precio, total
        */
        $id_venta=$datos['id_venta'];
        $id_producto=$datos['id_producto'];
        $cantidad=$datos['cantidad'];
        $precio=$datos['precio'];
        $total=$datos['total'];

        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO pedidos (id_venta,id_producto,cantidad,precio,total) VALUES (?,?,?,?,?) ");
            $stmt->bind_param("iisss",$id_venta,$id_producto,$cantidad,$precio,$total);
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

    public function getPrecioArticulo($id){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT precio  FROM `productos` WHERE id = $id";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }
      



}//class