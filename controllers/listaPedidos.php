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
    }
    



}//Class