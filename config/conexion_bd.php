<?php
$conexion = new mysqli(HOST, USER, PASSWORD, DB);
if ($conexion->connect_error) {
    echo $conexion->connect_error;
}