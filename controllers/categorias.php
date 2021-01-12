<?php
class Categorias extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('categorias/index');
    }
    



}//Class