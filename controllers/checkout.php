<?php
class Checkout extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->datos_envio=[];
        $this->view->articulos_pagar = [];
    }
    function render(){ 
        if (isset($_GET['pagar'])&&$_GET['pagar']=='true'&&isset($_GET['accion'])) {
            $consultaDB=$this->model->getDatosClientes($_SESSION['id']);
            $this->view->datos_envio=$resultado=$consultaDB->fetch_assoc();
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
    }//

    function pagarArticulo(){
        //mapeando datos
        $cantidad=(int)$_POST['cantidad_articulo'];
        $id_articulo=(int)$_POST['id_articulo'];
        $calle=$_POST['calle'];
        $numero= $_POST['numero'];
        $ciudad=$_POST['ciudad'];
        $pais=$_POST['pais'];
        $cp=$_POST['cp'];
        $destinatario=$_POST['destinatario'];
        //formateando los datos de envío
        $datos_envio="$calle $numero, $ciudad, $pais, $cp";
        $status=1;//No pagado

        //obteniendo el precio
        $consultaDB=$this->model->getPrecioArticulo($id_articulo);
        $precio =(float)$consultaDB->fetch_assoc()['precio'];
        $total=$cantidad*$precio;

        $consultaDB=$this->model->insertarVenta([
            'datos_envio'=>$datos_envio,
            'destinatario'=>$destinatario,
            'status'=>$status,
            'total'=>$total//total venta
            ]);

        $id_insertado=$consultaDB['id'];//id_venta
        $resultado_venta=$consultaDB['respuesta'];

        if ($resultado_venta=='exito') {
            $consultaDB=$this->model->insertarPedido([
                'id_venta'      =>$id_insertado,
                'id_producto'   =>$id_articulo,
                'cantidad'      =>$cantidad,
                'precio'        =>$precio,
                'total'         =>$cantidad*$precio
            ]);
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'insertarPedido',
                'mensaje'=>'El pedido se hizo correctamente'
            );
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'tipo'=>'insertarPedido',
                'mensaje'=>'Hubo un error al hacer el pedido'
            );
        }

        

        return die(json_encode($respuesta));
    }

    function pagarCarrito(){
        
        $calle=$_POST['calle'];
        $numero= $_POST['numero'];
        $ciudad=$_POST['ciudad'];
        $pais=$_POST['pais'];
        $cp=$_POST['cp'];

        $destinatario=$_POST['destinatario'];
        $datos_envio="$calle $numero, $ciudad, $pais, $cp";
        $carrito=$_SESSION['carrito'];
        $total=(float)$_POST['total'];
        $status=1;//No pagado

        $consultaDB=$this->model->insertarVenta([
            'datos_envio'=>$datos_envio,
            'destinatario'=>$destinatario,
            'status'=>$status,
            'total'=>$total//total venta
            ]);
        $id_insertado=$consultaDB['id'];//id_venta
        $resultado_venta=$consultaDB['respuesta'];
        

        foreach ($carrito as $item) {
            if ($resultado_venta=='exito') {
                $precioItem=str_replace(',', '',$item['precio']);
                $consultaDB=$this->model->insertarPedido([
                    'id_venta'      =>$id_insertado,
                    'id_producto'   =>$item['id'],
                    'cantidad'      =>$item['cantidad'],
                    'precio'        =>$precioItem,
                    'total'         =>$item['cantidad'] * (float)$precioItem
                ]);
                if ($consultaDB=='exito') {
                    $_SESSION['carrito']=array();
                }
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'insertarPedido',
                    'mensaje'=>'El pedido se hizo correctamente'
                );
            }else{
                $respuesta=array(
                    'respuesta'=>'error',
                    'tipo'=>'insertarPedido',
                    'mensaje'=>'Hubo un error al hacer el pedido'
                );
            }
        }//foreach

        die(json_encode($respuesta));
    }


   


}//Class