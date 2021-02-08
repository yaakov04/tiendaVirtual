<?php
class todosProductos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->nPaginas=[];
        $this->view->productos=[];
    }
    function render(){
        if (isset($_GET['pagina'])) {
        $resultadosPorPagina=8;
        $consultaDB=$this->model->nTotalProductos();
        $nTotalProductos = $consultaDB->fetch_assoc()['total'];
        $totalPaginas= round($nTotalProductos / $resultadosPorPagina);
        $this->view->nPaginas=$totalPaginas;

        if (is_numeric($_GET['pagina'])) {

            if ($_GET['pagina']>=1&&$_GET['pagina']<=$totalPaginas) {

                $paginaActual=$_GET['pagina'];
                $indice=($paginaActual-1) * $resultadosPorPagina;
                $consultaDB=$this->model->getProductos([
                    'posicion'=>$indice,
                    'limit'=>$resultadosPorPagina
                ]);
                $this->view->productos=$consultaDB;
                $this->view->render('todosProductos/index');
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
    
}