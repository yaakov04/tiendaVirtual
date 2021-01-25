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
        
        $consultaDB=$this->model->getDatosWishlist($_POST['id_articulo']);
        $resultado = $consultaDB->fetch_assoc();
        $articulo= array(
            'id' => $resultado['id'],
            'nombre' => $resultado['nombre_producto'],
            'precio' => $resultado['precio'],
            'img' => $resultado['img_producto'],
            'cantidad'=> 1
        );
        //comprueba si ya existe el item en el wishlist
        if (isset($_SESSION['wishlist'][$articulo['id']])) {
            //existe->item++
            $_SESSION['wishlist'][$articulo['id']]['cantidad']++;
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloWishlist',//++
                'mensaje'=>'Se añadio el articulo: '.$_SESSION['wishlist'][$articulo['id']]['nombre'].' X'.$_SESSION['wishlist'][$articulo['id']]['cantidad'].' al wishlist'
            );
        }else{
            //¬existe->additem
            $_SESSION['wishlist'][$articulo['id']]=$articulo;
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloWishlist',
                'mensaje'=> 'El articulo: '.$_SESSION['wishlist'][$articulo['id']]['nombre'].' se añadio correctamente'
            );
        }
        die(json_encode($respuesta));
    }

    function eliminarArticulo(){
        $id=$_POST['id_articulo'];
        if (isset($_SESSION['wishlist'][$id])) {
            //existe->eliminarItem
            unset($_SESSION['wishlist'][$id]);
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'eliminarArticuloWishlist',
                'mensaje'=>'El articulo se elimino correctamente'
            );

        }else{
            //¬existe->notificar
            $respuesta=array(
                'respuesta'=>'error',
                'tipo'=>'eliminarArticuloWishlist',
                'mensaje'=>'No existe el articulo'
                );
        }
        die(json_encode($respuesta));
    }

    function artCarritoToWishlist(){
        $id_articulo=$_POST['id_articulo'];
        $cantidad =$_POST['cantidad'];

        if (isset($_SESSION['carrito'][$id_articulo])) {
            $articulo = $_SESSION['carrito'][$id_articulo];
            unset($_SESSION['carrito'][$id_articulo]);
            if (isset($_SESSION['wishlist'][$id_articulo])) {
                $_SESSION['wishlist'][$id_articulo]['cantidad']+=(int)$cantidad;
                $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloWishlist',//++
                'mensaje'=>'Se añadio el articulo: '.$_SESSION['wishlist'][$articulo['id']]['nombre'].' X'.$_SESSION['wishlist'][$articulo['id']]['cantidad'].' al wishlist'
            );
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
    }//

    function guardarWishlist(){
        $consultaDB=$this->model->existeRegistro();
        $existe=$consultaDB;
        //comprobar usuario en la tabla carrito
        if ($existe) {
            //existe->guardaWishlist
            $consultaDB=$this->model->guardarWishlist();
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'guardarWishlist'
            );
        }else{
            //¬existe->creaRegistro
            $consultaDB=$this->model->insertWishlist();
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'guardarWishlist'
            );
        }
        
        //$consultaDB= $this->model->guardarCarritoDB();*/
        die(json_encode($respuesta));
    }//

    function getWishlist(){
        $consultaDB=$this->model->getWishlist();
        $resultado=$consultaDB->fetch_assoc();
        $wishlist = json_decode($resultado['productos'], true);
        $_SESSION['wishlist']=$wishlist;
        die(json_encode($wishlist));
    
    }



}//Class
