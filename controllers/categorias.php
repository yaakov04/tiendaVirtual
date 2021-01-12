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
    



}//Class