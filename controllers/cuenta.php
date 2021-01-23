<?php
class Cuenta extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->datos_usuario=array();
   
    }

    function render(){
        $id=$_SESSION['id'];
        $consultaDB = $this->model->tenerDatosUser($id);
        $resultado=$consultaDB->fetch_assoc();
        $this->view->datos_usuario=$resultado;
        $this->view->render('cuenta/index');
    }

    function ActualizarDatos(){
        $consultaDB = $this->model->ActualizarDatosDB($_POST);
        if ($consultaDB=='exito') {
            $respuesta=array(
                'respuesta'=> $consultaDB,
                'tipo' => 'actualizarDatosCuenta',
                'mensaje' => 'Los datos del usuario con id: '.$_SESSION['id'].' se actualizaron correctamente'
            );
        }else{
            $respuesta=array(
                'respuesta'=> 'error',
                'tipo' => 'actualizarDatosCuenta',
                'mensaje' => 'Hubo un error al actualizar los datos'
            );
        }
        die(json_encode($respuesta));
    }
    
    function cambiar_password(){
        $this->view->render('cuenta/password');
    }



}//Class