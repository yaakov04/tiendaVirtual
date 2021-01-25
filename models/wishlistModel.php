<?php
class wishlistModel{
    public function __construct(){

    }


    public function getDatosWishlist($idArticulo){
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
    }//

    public function existeRegistro(){
        $id_user=$_SESSION['id'];
        try{
            
            require 'config/conexion_bd.php';
            $sql= " SELECT id FROM `wishlist` WHERE id_usuario = $id_user ";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows>0) {
                $respuesta=true;
            }else{
                $respuesta=false;
            }
            $conexion->close();
            return $respuesta;
            
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        
    }//

    public function guardarWishlist(){
        $wishlist=json_encode($_SESSION['wishlist']);
        $id_user=$_SESSION['id'];
       try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" UPDATE wishlist SET productos = ?, editado = NOW() WHERE id_usuario = ? ");
            $stmt->bind_param("si", $wishlist, $id_user);
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

    public function insertWishlist(){
        $wishlist=json_encode($_SESSION['wishlist']);
        $id_user=$_SESSION['id'];
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" INSERT INTO wishlist (id_usuario, productos) VALUES (?,?) ");
            $stmt->bind_param("is", $id_user, $wishlist);
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
    } //
      



}//class