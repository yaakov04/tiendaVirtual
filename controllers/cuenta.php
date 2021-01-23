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

    }
    



}//Class