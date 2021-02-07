<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->novedades=[];
        $this->view->masVendidos=[];
        
    }
    function render(){
       $resultado = $this->model->getNovedades();
       $this->view->novedades=$resultado;
       $consultaDB=$this->model->getMAsVendidos();
       $this->view->masVendidos=$consultaDB;
        
        
        $this->view->render('Main/index');
    }
    function hola(){
        echo 'hola desde el metodo hola';
    }



}//Class