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

    public function existeRegistro(){
        $id_user=$_SESSION['id'];
        //$id_user=58;
        try{
            
            require 'config/conexion_bd.php';
            $sql= " SELECT id FROM `carrito` WHERE id_usuario = $id_user ";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows>0) {
                $respuesta=true;
            }else{
                $respuesta=false;
            }
            return $respuesta;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        
    }//

    public function insertCarrito(){
        $carrito=json_encode($_SESSION['carrito']);
        $id_user=$_SESSION['id'];
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO carrito (id_usuario, productos) VALUES (?,?) ");
            $stmt->bind_param("is", $id_user, $carrito);
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
        return 'exito';
    }//

    public function guardarCarrito(){
        $carrito=json_encode($_SESSION['carrito']);
        $id_user=$_SESSION['id'];
       try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" UPDATE carrito SET productos = ?, editado = NOW() WHERE id_usuario = ? ");
            $stmt->bind_param("si", $carrito, $id_user);
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

    public function getCarrito(){
        if (isset($_SESSION['carrito'])&&$_SESSION['login']=='true') {
            $id_user=$_SESSION['id'];
            try{
                require 'config/conexion_bd.php';
                $sql= " SELECT productos FROM carrito WHERE id_usuario = $id_user ";
                $resultado = $conexion->query($sql);
                $conexion->close();
                return $resultado;
            }catch (Exception $e) {
                echo 'error:' . $e;
            }
        }
        
    }
      



}//class