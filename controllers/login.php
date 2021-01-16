<?php
class Login extends Controller{
    function __construct(){
        parent::__construct();
        
        if (isset($_GET['sesion'])) {
            if ($_GET['sesion']=='finalizada') {
                $_SESSION = array();
            }
        }
        
        redirectionToMain();

       // var_dump($_SESSION);
       

    }//construct

    function render(){
        $this->view->render('login/index');
    }

    function iniciarSesion(){
        if ($_POST['username']==''||$_POST['password']=='') {
            $respuesta=$respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'campos vacios'
            );
        }else{
            $resultado =$this->model->iniciarSesionBD($_POST);
            $respuesta = array(
                'respuesta'=>$resultado,
                'tipo'=> 'login'
            );
        }
        die(json_encode($respuesta));
    }
    



}//Class