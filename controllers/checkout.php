<?php
class Checkout extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->articulos_pagar = [];
    }
    function render(){ 
        if (isset($_GET['pagar'])&&$_GET['pagar']=='true'&&isset($_GET['accion'])) {
            switch ($_GET['accion']) {
                case 'pagar_carrito':
                    //muesta todos los items del carrito
                    $this->view->articulos_pagar = $_SESSION['carrito'];
                    $this->view->render('checkout/index');
                    break;
                case 'pagar_articulo_carrito':
                    //muestra un item del carrito                    
                    $id_articulo= $_GET['id_articulo'];
                    $carrito= $_SESSION['carrito'];
                    //comprueba si el item esta en el carrito
                    if (isset($carrito[$id_articulo])) {
                        $articulo[$id_articulo]=$carrito[$id_articulo];
                        $this->view->articulos_pagar =$articulo;
                        $this->view->render('checkout/index');
                    }else{
                        $error = new Falla();
                        $error->render();
                    }
                    break;
                case 'pagar_articulo':
                    $id_articulo= $_GET['id_articulo'];
                    $cantidad=$_GET['cantidad'];
                    $consultaDB = $this->model->getDatosArticulos($id_articulo);
                    $existe_articulo = $consultaDB->num_rows;
                    //comprueba que exista el articulo
                    if ($existe_articulo) {
                        $resultado = $consultaDB->fetch_assoc();
                        $articulo[$resultado['id']]=array(
                            'id'=>$resultado['id'],
                            'nombre'=> $resultado['nombre_producto'],
                            'precio'=>$resultado['precio'],
                            'img'=>$resultado['img_producto'],
                            'cantidad'=>$cantidad
                        );
                        $this->view->articulos_pagar =$articulo;
                        $this->view->render('checkout/index');
                    }else{
                        $error = new Falla();
                        $error->render();
                    }
                    break;
                
                default:
                    $error = new Falla();
                    $error->render();
                    break;
            }
        }else{
            $error = new Falla();
            $error->render();
        }
        //$this->view->render('checkout/index');
    }


   


}//Class