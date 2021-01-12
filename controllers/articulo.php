<?php
class Articulo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->articulo=[];
       
        
    }
    
    function render(){
       $resultado = $this->model->mostrarArticulo($_GET['id']);
       $existe_articulo = $resultado->num_rows;
       $this->view->articulo=$resultado;

       if ($existe_articulo) {
        $this->view->render('articulo/index');
       }else{
           $error = new Falla();
           $error->render();
       }

        
    }//render
    

}//Class