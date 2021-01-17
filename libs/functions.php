<?php
function redirectionToMain(){
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']=true) {
            header('Location:'. URL.Main);
        }
    }
}

function checkLoginNavCuenta(){
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']==true) {
            return '
                    <li><a href="'.URL.'cuenta">Ver perfil</a></li>
                    <li><a href="'.URL.'login?sesion=finalizada">Cerrar sesion</a></li>
                ';
        }
    }else{
        return '
        <li><a href="'.URL.'login">Inicia sesion</a> o <a href="'.URL.'registrarse">Registrate</a></li>
        ';
    }
}

function checkLoginNavCarrito(){
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']==true) {
            return '
                    <li><a href="'.URL.'carrito">Ver carrito</a></li>
                    <li><a href="'.URL.'wishlist">Wish list</a></li>
                ';
        }
    }else{
        return '
        <li><a href="'.URL.'login">Inicia sesion</a> o <a href="'.URL.'registrarse">Registrate</a></li>
        ';
    }
}