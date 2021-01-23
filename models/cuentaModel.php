<?php
class cuentaModel{
    public function __construct(){

    }


public function tenerDatosUser($id){
    try{
        require 'config/conexion_bd.php';
        $sql= " SELECT * FROM `usuarios` WHERE id = $id";
        $resultado = $conexion->query($sql);
        return $resultado;
        $conexion->close();
    }catch (Exception $e) {
        echo 'error:' . $e;
    }
}//metodo

public function ActualizarDatosDB($datos){
        $id_usuario = $_SESSION['id'];
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
        
        try{
            require 'config/conexion_bd.php';
            $stmt = $conexion->prepare(" UPDATE usuarios SET  usuario = ?, nombre = ?, apellido = ?, fecha_nacimiento = ?, email = ?, calle = ?, numero = ?, ciudad = ?, pais = ?, cp = ?, editado = NOW() WHERE id = ? ");
            $stmt->bind_param("ssssssssssi",  $usuario, $nombre, $apellido, $fecha_nacimiento, $email, $calle, $numero, $ciudad, $pais, $cp, $id_usuario);
            $stmt->execute();
            if ($stmt->affected_rows==1) {
                $respuesta = 'exito';
            }
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;

}


      



}//class