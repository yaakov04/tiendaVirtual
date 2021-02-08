<?php
class listaPedidosModel{
    public function __construct(){

    }
    public function nTotalPedidos(){
        $id_cliente=$_SESSION['id'];
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT COUNT(*) as numero_pedidos FROM pedidos INNER JOIN ventas ON pedidos.id_venta = ventas.id";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id";
            $sql.=" WHERE ventas.id_cliente = $id_cliente ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//

    public function getPedidos($datos){
        $id_cliente=$_SESSION['id'];
        $posicion=$datos['posicion'];
        $limite=$datos['limit'];
        try{
            require 'config/conexion_bd.php';
            $sql= " SELECT pedidos.id as id_pedido, pedidos.cantidad, ventas.id_cliente as cliente_id, ventas.estatus as id_estado, estados.estado, productos.nombre_producto, productos.img_producto FROM pedidos ";
            $sql.=" INNER JOIN ventas ON pedidos.id_venta = ventas.id "; 
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id ";
            $sql.=" INNER JOIN estados ON estados.id = ventas.estatus "; 
            $sql.=" WHERE ventas.id_cliente = $id_cliente ";
            $sql.=" ORDER BY ventas.fecha";
            $sql.=" LIMIT ".$posicion.','.$limite;
            $resultado = $conexion->query($sql);
            return $resultado;
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
    }//
}