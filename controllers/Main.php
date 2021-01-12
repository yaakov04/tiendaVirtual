<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->novedades=[];
        $this->view->test=[];
        
    }
    function render(){
       $resultado = $this->model->getNovedades();
       $this->view->novedades=$resultado;
    
        
        $resultado= $this->model->test();
        
        $this->view->test=$resultado;
        
        $this->view->render('Main/index');
    }
    function hola(){
        echo 'hola desde el metodo hola';
    }



}//Class