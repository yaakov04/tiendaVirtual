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
            $this->view->categorias =$consultaDB;
            //$this->view->nombreCat=[];
            $consultaDB=$this->model->getCatname($categoria);
            $resultado=$consultaDB->fetch_assoc();
            $this->view->nombreCat=$resultado['categoria'];
            $this->view->render('categorias/categoria');
        }else{
            $controller= new Falla();
            $controller->render();
        }
        


    }
    



}//Class