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

    public function mostrarCategoria($categoria){
        $cat = strval($categoria);
        
        try{
            require 'config/conexion_bd.php';
            //$sql= " SELECT * FROM productos JOIN categorias ON productos.categoria = categorias.id AND categorias.nombre_categoria = $categoria ";
            $sql= " SELECT * FROM productos INNER JOIN categorias ON productos.categoria = categorias.id WHERE categorias.nombre_categoria = '$categoria' ";

            $resultado = $conexion->query($sql);
            $conexion->close();
            return $resultado;
            
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//

    public function getCatname($categoria){
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT categoria FROM categorias WHERE nombre_categoria = '$categoria' ";

            $resultado = $conexion->query($sql);
            $conexion->close();
            return $resultado;
            
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }
      



}//class