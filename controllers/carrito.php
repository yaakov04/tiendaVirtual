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
        $repite=false;
        if (count($_SESSION['carrito'])>0) {
            for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
               if ($_SESSION['carrito'][$i]['id']==$articulo['id']) {
                   //se repite cantidad++
                $_SESSION['carrito'][$i]['cantidad']++;
                $respuesta=array(
                    'respuesta'=>'exito',
                    'tipo'=>'addArticuloCarrito',
                    'mensaje'=>'cantidad++'
                );
                $repite=true;
                $i= count($_SESSION['carrito'])+1;
               }
            }

            if (!$repite) {
                //agrega item cart si no se repite
                array_push($_SESSION['carrito'], $articulo);
                $respuesta=array(
                    'respuesta'=>'exito',
                    'tipo'=>'addArticuloCarrito'
                );
            }
        }else{
            array_push($_SESSION['carrito'], $articulo);
            $respuesta=array(
                'respuesta'=>'exito',
                'tipo'=>'addArticuloCarrito'
            );
        }
        
        
        die(json_encode($respuesta));
    }//metodo
    



}//Class