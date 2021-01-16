<?php
class loginModel{
    public function __construct(){

    }


      

public function iniciarSesionBD($datos){
    $usuario=filter_var($datos['username'], FILTER_SANITIZE_STRING);
    $password=$_POST['password'];
    
    try{
        require 'config/conexion_bd.php';
        $stmt = $conexion->prepare(" SELECT id, usuario, password FROM usuarios WHERE usuario = ? ");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($result_id, $result_usuario, $result_password);
        $usuario_existe= $stmt->fetch();

        if ($usuario_existe) {
            if (password_verify($password, $result_password)) {
                //inicia sesion
                $_SESSION['id']=$result_id;
                $_SESSION['usuario']=$result_usuario;
                $_SESSION['login']=true;
                $respuesta='exito';
            }else{
                //password incorrecto
                $respuesta='error';
            }
        }else{
            //No existe el usuario
            $respuesta='error';
        }
        
        $stmt->close();
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }

    return $respuesta;
}

}//class