<?php
class pagar extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('pagar/index');
     }
}