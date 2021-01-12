<?php
class Cuenta extends Controller{
    function __construct(){
        parent::__construct();
   
    }

    function render(){
        $this->view->render('cuenta/index');
    }
    



}//Class