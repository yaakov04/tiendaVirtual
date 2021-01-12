<?php
class ListaPedidos extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('listaPedidos/index');
    }
    



}//Class