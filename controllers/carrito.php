<?php
class Carrito extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        
    }
    function render(){
        $this->view->render('carrito/index');
    }

    function addArticulo(){
        $consultaBD=$this->model->getDatosAddCarrito($_POST['id_articulo']);
        $resultado = $consultaBD->fetch_assoc();
        $articulo= array(
            'id' => $resultado['id'],
            'nombre' => $resultado['nombre_producto'],
            'precio' => $resultado['precio'],
            'img' => $resultado['img_producto'],
            'cantidad'=> 1
        );
//var_dump($_SESSION['carrito'][1]['id']);
        
        if (isset($_SESSION['carrito'])) {
            array_push($_SESSION['carrito'], $articulo);
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloCarrito'
            );
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'tipo'=>'addArticuloCarrito'
            );
        }
        
        die(json_encode($respuesta));
    }
    



}//Class