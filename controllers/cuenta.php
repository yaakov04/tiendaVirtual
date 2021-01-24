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
    
    function cambiar_password($param=null){
        if (!$param==null) {
            //confirma que el parametro sea cambiar
            if ($param[0]=='cambiar') {
                //confirma que se hayan enviado los datos
                if (isset($_POST['new-password'])&&isset($_POST['confirm-password'])) {
                    $new_password=$_POST['new-password'];
                    $confirm_password=$_POST['confirm-password'];
                    //confirma que la nueva contraseña sea igual a la confirmacion
                    if ($new_password == $confirm_password) {
                        //son iguales->actualiza la contraseña
                        $consultaDB=$this->model->actualizarPasswordDB($new_password);
                        if ($consultaDB=='exito') {
                            echo '
                            <script>
                                alert("Contraseña cambiada correctamente");
                                window.location.href = "http://localhost/elPuestito/cuenta/cambiar_password";
                            </script>
                            ';
                        }else{
                            die('hubo un error con la Base de Datos');
                        }
                    }else{
                        //¬son iguales->notifca
                        die('La confirmacion de la contraseña no coincide');
                    }
                }else{
                    //¬datos->renderFalla
                    $controller= new Falla();
                    $controller->render();
                    return;
                }
            }else{
                //¬parametro=cambiar->renderFalla
                $controller= new Falla();
                $controller->render();
                return;
            }
        }
        $this->view->render('cuenta/password');
    }

    



}//Class