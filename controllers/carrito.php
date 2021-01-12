<?php
class Carrito extends Controller{
    function __construct(){
        parent::__construct();

        
    }
    function render(){
        $this->view->render('carrito/index');
    }
    



}//Class