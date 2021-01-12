<?php
class Registrarse extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('registrarse/index');
    }
    



}//Class