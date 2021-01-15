<?php
class Registrarse extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('registrarse/index');
    }

    function registrar(){
        if ($_POST['nombre']==''||$_POST['password']==''||$_POST['username']==''||$_POST['apellido']==''||$_POST['fecha-nac']==''||$_POST['email']==''||$_POST['calle']==''||$_POST['numero']==''||$_POST['ciudad']==''||$_POST['pais']==''||$_POST['cp']=='') {
            $respuesta=$respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'campos vacios'
            );
        }else{
                $resultado= $this->model->registrarBD($_POST);
                $respuesta=array(
                    'respuesta'=>$resultado,
                    'tipo'=>'regitrar'
                );
            }

        
        die(json_encode($respuesta));

    }
    
    



}//Class