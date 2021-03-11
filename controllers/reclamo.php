<?php
class reclamo extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
       //validar sesion iniciada
        if (isset($_SESSION['login'])&&$_SESSION['login']==true) {
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

    function solicitud_enviada(){
        if (isset($_SESSION['login'])&&$_SESSION['login']==true){
            $this->view->render('reclamo/solicitud_enviada');
        }else{
            $controller= new Falla();
            $controller->render();
        }
        
    }//

    function lista(){
        if (isset($_SESSION['login'])&&$_SESSION['login']==true){
            $consultaDB=$this->model->getReclamos($_SESSION['id']);
            $this->view->reclamos=array();
            while ($resultado=$consultaDB->fetch_assoc()) {
                //comprobar si exite el reclamo
                if (isset($this->view->reclamos[$resultado['reclamo']])) {
                    //existe->No hagas nada
                    continue;
                }else{
                    //¬existe->agregalo
                    $this->view->reclamos[$resultado['reclamo']]=$resultado;
                }
            }
            $this->view->render('reclamo/lista');
        }else{
            $controller= new Falla();
            $controller->render();
        }
    }//

    function ver($param){
        //validar id
        $id_reclamo=filter_var($param[0], FILTER_VALIDATE_INT);
        if ($id_reclamo) {
            //validar login
            if (isset($_SESSION['login'])&&$_SESSION['login']==true){
                //validar el reclamo
                $consultaDB=$this->model->validarReclamo($id_reclamo);
                if ($consultaDB->num_rows>0) {
                    $consultaDB=$this->model->getReclamo($id_reclamo);
                    $this->view->mensajes=array();
                    while ($resultado=$consultaDB->fetch_assoc()) {
                        array_push($this->view->mensajes, $resultado);
                    }
                    $this->view->render('reclamo/ver');
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

    function nuevo_mensaje(){
        //validando el get
        $respuesta_mensaje=filter_var($_GET['respuesta_mensaje'], FILTER_VALIDATE_INT);
        $reclamos_id=filter_var($_GET['reclamo_id'], FILTER_VALIDATE_INT);
        $venta_id=filter_var($_GET['venta_id'], FILTER_VALIDATE_INT);
        $pedido_id=filter_var($_GET['pedido_id'], FILTER_VALIDATE_INT);
        $asunto=filter_var($_GET['asunto'], FILTER_SANITIZE_STRING);
        if ($respuesta_mensaje&&$reclamos_id&&$venta_id&&$pedido_id) {
            //validando si existe reclamo
            $consultaDB=$this->model->hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje);
            if ($consultaDB->num_rows==1) {
                $this->view->datos=array(
                    'reclamos_id'       =>$reclamos_id,
                    'venta_id'          =>$venta_id,
                    'pedido_id'         =>$pedido_id,
                    'respuesta_mensaje' =>$respuesta_mensaje,
                    'asunto'            =>$asunto
                );
                $this->view->render('reclamo/nuevo_mensaje');
            }else{
                $controller= new Falla();
                $controller->render();
            }
            
        }else{
            $controller= new Falla();
            $controller->render();
        }
    }

    function levantarReclamo(){
        $venta_id=filter_var($_POST['id_venta'], FILTER_VALIDATE_INT);
        $pedido_id=filter_var($_POST['id_pedido'], FILTER_VALIDATE_INT);

        if ($venta_id&&$pedido_id) {
            $datos=array();
            $consultaDB=$this->model->levantarReclamo($_SESSION['id']);
            $datos['id_reclamo']=$consultaDB;
            $consultaDB=$this->model->getNombreUsuario($_SESSION['id']);
            $resultado=$consultaDB->fetch_assoc();

            $datos['nombre']=$resultado['nombre'].' '.$resultado['apellido'];
            $datos['correo']=$resultado['email'];  
            $datos['asunto']=filter_var($_POST['Asunto'], FILTER_SANITIZE_STRING);
            $datos['mensaje']=filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
            $datos['id_venta']=$venta_id;
            $datos['id_pedido']=$pedido_id;

            $consultaDB=$this->model->guardarMensaje($datos);
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'levantarReclamo'
            );
            $consultaDB=$this->model->cambiarEstadoReclamo($venta_id);
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'id de venta o id de pedido no son validos'
            );
            die(json_encode($respuesta));
        }



        die(json_encode($respuesta));
    }//

    function responderMensaje(){
        $reclamos_id=filter_var($_POST['reclamos_id'], FILTER_VALIDATE_INT);
        $venta_id=filter_var($_POST['venta_id'], FILTER_VALIDATE_INT);
        $pedido_id=filter_var($_POST['pedido_id'], FILTER_VALIDATE_INT);
        $respuesta_mensaje=filter_var($_POST['respuesta_mensaje'], FILTER_VALIDATE_INT);
        $asunto=filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
        $mensaje_nuevo=filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
        if ($reclamos_id&&$venta_id&&$pedido_id&&$respuesta_mensaje) {

            //validando si existe reclamo
            $consultaDB=$this->model->hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje);
            if ($consultaDB->num_rows==1) {

                $datos['id_reclamo']=$consultaDB;
                $consultaDB=$this->model->getNombreUsuario($_SESSION['id']);
                $resultado=$consultaDB->fetch_assoc();
                $nombre = $resultado['nombre'].' '.$resultado['apellido'];
                $correo=$resultado['email']; 
               
                //insertar en la BD
                $consultaDB=$this->model->responderMensaje([
                    'id_reclamo'    =>$reclamos_id,
                    'id_venta'      =>$venta_id,
                    'id_pedido'     =>$pedido_id,
                    'nombre'        =>$nombre,
                    'correo'        =>$correo,
                    'asunto'        =>$asunto,
                    'mensaje'       =>$mensaje_nuevo
                ]);
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'responderMensaje',
                    'reclamo'=>$reclamos_id
                );
            }else{
                $respuesta=array(
                    'respuesta'=>'error'
                );
            }

            
        }else{
            $respuesta=array(
                'respuesta'=>'error'
            );
        }
        die(json_encode($respuesta));
    }//
    function resolverReclamo(){
        $id_reclamo = filter_var($_POST['id_reclamo'], FILTER_VALIDATE_INT);
        $id_pedido = filter_var($_POST['id_pedido'], FILTER_VALIDATE_INT);
        $id_venta = filter_var($_POST['id_venta'], FILTER_VALIDATE_INT);
        $id_mensaje = filter_var($_POST['id_venta'], FILTER_VALIDATE_INT);
        if ($id_reclamo&&$id_pedido&&$id_venta&&$id_mensaje) {
            //validar si existe reclamo
            $consultaDB=$this->model->hayReclamo($id_reclamo, $id_venta, $id_pedido);
            if ($consultaDB->num_rows==1) {
                $consultaDB=$this->model->resolverEstadoReclamo($id_venta);
                if ($consultaDB=='exito') {
                    $consultaDB=$this->model->resolverReclamo($id_reclamo);
                    $respuesta=array(
                        'respuesta'=>$consultaDB,
                        'post' =>$_POST
                    );
                }else{
                    $respuesta=array(
                        'respuesta'=>'error'
                    );
                }
                

            }else{
                $respuesta=array(
                    'respuesta'=>'error'
                );
            }
        }else{
            $respuesta=array(
                'mensaje'=>'id no valido',
                'respuesta'=>'error'
            );
        }
        die(json_encode($respuesta));
    }
}