<?php
class Categorias extends Controller{
    function __construct(){
        parent::__construct();

        $this->view->categorias = [];
    }
    function render(){
        $resultado=$this->model->mostrarCategorias();
        $this->view->categorias =$resultado;
//        var_dump($resultado);
        $this->view->render('categorias/index');
    }
    function mostrar($param=null){
        if (!$param==null) {
            $categoria=$param[0];
            $consultaDB=$this->model->mostrarCategoria($categoria);
            //$resultado= $consultaDB->fetch_assoc();
            echo '<pre>';
            //var_dump($consultaDB->fetch_assoc());
            echo '</pre>';
            $this->view->categorias =$consultaDB;
            $this->view->render('categorias/categoria');
        }else{
            $controller= new Falla();
            $controller->render();
        }
        


    }
    



}//Class