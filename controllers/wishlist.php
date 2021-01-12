<?php
class WishList extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('wishlist/index');
    }
    



}//Class