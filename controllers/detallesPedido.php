<?php
class DetallesPedido extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('detallesPedido/index');
    }
    



}//Class