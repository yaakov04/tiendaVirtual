<?php
class ListaPedidos extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->nPaginas=[];
        $this->view->pedidos=[];
    }
    function render(){
        if (isset($_GET['pagina'])) {
            $resultadosPorPagina=4;
            $consultaDB=$this->model->nTotalPedidos();
            $nTotalPedidos = $consultaDB->fetch_assoc()['numero_pedidos'];
            $totalPaginas= round($nTotalPedidos / $resultadosPorPagina);
            $this->view->nPaginas=$totalPaginas;

            if (is_numeric($_GET['pagina'])) {

                if ($_GET['pagina']>=1&&$_GET['pagina']<=$totalPaginas) {
    
                    $paginaActual=$_GET['pagina'];
                    $indice=($paginaActual-1) * $resultadosPorPagina;
                    $consultaDB=$this->model->getPedidos([
                        'posicion'=>$indice,
                        'limit'=>$resultadosPorPagina
                    ]);
                    $this->view->pedidos=$consultaDB;
                    $this->view->render('listaPedidos/index');
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

    function detallesPedido($param){
        
        $id_venta=filter_var($param[0], FILTER_VALIDATE_INT);
        //validar get
        if ($id_venta) {
            //validar id_venta
            $consultaDB=$this->model->existeVenta($id_venta);
            if ($consultaDB->num_rows==1) {
                $consultaDB=$this->model->getVentaPedidos($id_venta);
                var_dump($consultaDB);
                while ($resultado=$consultaDB->fetch_assoc()) {
                    var_dump($resultado);
                }
                $this->view->render('listaPedidos/detallesPedido');
            }
            
        }else{
            $controller= new Falla();
            $controller->render();
        }
        
    }
    



}//Class