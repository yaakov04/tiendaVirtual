<?php
class registrarseModel{
    public function __construct(){

    }


      

public function registrarBD($datos){
    $usuario=filter_var($datos['username'], FILTER_SANITIZE_STRING);
    $nombre=filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
    $apellido=filter_var($datos['apellido'], FILTER_SANITIZE_STRING);
    $email=filter_var($datos['email'], FILTER_SANITIZE_STRING);
    $calle=filter_var($datos['calle'], FILTER_SANITIZE_STRING);
    $numero=filter_var($datos['numero'], FILTER_SANITIZE_STRING);
    $ciudad=filter_var($datos['ciudad'], FILTER_SANITIZE_STRING);
    $pais=filter_var($datos['pais'], FILTER_SANITIZE_STRING);
    $cp=filter_var($datos['cp'], FILTER_SANITIZE_STRING);
    $fecha_nacimiento=date('Y-m-d', strtotime($datos['fecha-nac']));
    $opciones=array(
        'cost' => 12
    );
    $password= password_hash($datos['password'], PASSWORD_BCRYPT, $opciones);
    try{
        require 'config/conexion_bd.php';
        $stmt = $conexion->prepare(" INSERT INTO usuarios (usuario, password, nombre, apellido, fecha_nacimiento, email, calle, numero, ciudad, pais, cp) VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("sssssssssss", $usuario, $password, $nombre, $apellido, $fecha_nacimiento, $email, $calle, $numero, $ciudad, $pais, $cp);
        $stmt->execute();
        $respuesta='work';
        if($stmt->affected_rows > 0){
            $respuesta='exito';
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'tipo' => 'registrar'
            );
        }
    }catch (Exception $e) {
        echo 'error:' . $e;
    }

    return $respuesta;
}

}//class