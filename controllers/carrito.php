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

        if(isset($_SESSION['carrito'][$articulo['id']])){
            $_SESSION['carrito'][$articulo['id']]['cantidad']++;
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloCarrito',
                'mensaje'=>'Se añadio el articulo: '.$_SESSION['carrito'][$articulo['id']]['nombre'].' X'.$_SESSION['carrito'][$articulo['id']]['cantidad'].' al carrito'
            );
        }else{
            $_SESSION['carrito'][$articulo['id']]=$articulo;
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloCarrito',
                'mensaje'=> 'El articulo: '.$_SESSION['carrito'][$articulo['id']]['nombre'].' se añadio correctamente'
            );
        }//if-else
        die(json_encode($respuesta));
    }//metodo

    function eliminarArticulo(){
        $id = $_POST['id_articulo'];

        if(isset($_SESSION['carrito'][$id])){
            unset($_SESSION['carrito'][$id]);
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'eliminarArticulo',
                'mensaje'=>'El articulo se elimino correctamente'
            );
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'tipo'=>'eliminarArticulo',
                'mensaje'=>'No existe el articulo'
            );
            }

        
        die(json_encode($respuesta));
    }
    



}//Class