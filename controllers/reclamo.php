<?php
class reclamo extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
       //validar sesion iniciada
        if (isset($_SESSION['login'])==true) {
            //validar GET
            $venta_id=filter_var($_GET['venta_id'], FILTER_VALIDATE_INT);
            $pedido_id=filter_var($_GET['pedido_id'], FILTER_VALIDATE_INT);
            if ($venta_id&&$pedido_id) {
                //validar usuario
                $consultaDB=$this->model->getUsuarioVenta($_SESSION['id'], $venta_id);
                if ($consultaDB->num_rows==1) {
                    //validar si exite la venta y el pedido
                    $consultaDB=$this->model->getVentaPedido($venta_id, $pedido_id);
                    if ($consultaDB->num_rows==1) {
                        $this->view->render('reclamo/index');
                    }else{
                        $controller= new Falla();
                        $controller->render();
                    }
                }else{
                    $controller= new Falla();
                    $controller->render();
                }
                
            }else{
                $controller= new Falla();
                $controller->render();
            }
        }else{
            $controller= new Falla();
            $controller->render();
        }
        
    }//
}