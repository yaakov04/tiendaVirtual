<?php
class CategoriasModel{
    public function __construct(){

    }


public function mostrarCategorias(){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT * FROM `categorias`";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}
      



}//class