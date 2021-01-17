<?php
autenticacion();
function  autenticacion(){
    if (!user()) {
        header('Location:'. URL.'login');
        exit();
    }
}
function user(){
    return isset($_SESSION['id']);
}