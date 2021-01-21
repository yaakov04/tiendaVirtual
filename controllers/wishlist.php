<?php
class WishList extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $this->view->render('wishlist/index');
    }
    function addArticulo(){
        $cantidad = $_POST['cantidad'];
        $consultaDB=$this->model->getDatosWishlist($_POST['id_articulo']);
        $resultado = $consultaDB->fetch_assoc();
        $articulo= array(
            'id' => $resultado['id'],
            'nombre' => $resultado['nombre_producto'],
            'precio' => $resultado['precio'],
            'img' => $resultado['img_producto'],
            'cantidad'=> $cantidad
        );
    }
    function artCarritoToWishlist(){
        $id_articulo=$_POST['id_articulo'];
        $cantidad =$_POST['cantidad'];

        if (isset($_SESSION['carrito'][$id_articulo])) {
            $articulo = $_SESSION['carrito'][$id_articulo];
            unset($_SESSION['carrito'][$id_articulo]);
            if (isset($_SESSION['wishlist'][$id_articulo])) {
                $_SESSION['wishlist'][$id_articulo]['cantidad']+=(int)$cantidad;
            }else{
                $_SESSION['wishlist'][$id_articulo]=$articulo;
                $respuesta=array(
                    'respuesta'=>'exito',
                    'tipo'=>'moverAlWishlist',
                    'mensaje'=>'El articulo se movio al wish list correctamente'
                    );
            }
            
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'tipo'=>'moverAlWishlist',
                'mensaje'=>'No existe el articulo en el carrito'
            );
        }

        

        die(json_encode($respuesta));
    }



}//Class