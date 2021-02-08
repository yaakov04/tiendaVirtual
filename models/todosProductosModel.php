<?php
class todosProductosModel{
    public function __construct(){

    }

    public function nTotalProductos(){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT COUNT(*) AS total FROM productos ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }

    public function getProductos($datos){
        $posicion=$datos['posicion'];
        $limite=$datos['limit'];
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT * FROM productos LIMIT ".$posicion.",". $limite;
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }

}