<?php
class Checkout extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    function render(){ 
        $this->view->render('checkout/index');
    }
   


}//Class