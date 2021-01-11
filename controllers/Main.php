<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    function render(){
        $this->view->render('Main/index');
    }
    function hola(){
        echo 'hola desde el metodo hola';
    }



}//Class