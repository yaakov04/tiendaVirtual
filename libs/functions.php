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
                    <li><a id="logout" href="'.URL.'login?sesion=finalizada">Cerrar sesion</a></li>
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

function checkCarritoItems(){
    if (count($_SESSION['carrito'])==0) {
        return '<p style="margin:4.2rem;font-size:2.2rem">No hay items en el carrito</p>';
    }
}

function checkItemsCarritoIcon(){
    if (isset($_SESSION['carrito'])) {
        if (count($_SESSION['carrito'])>0) {
            return '<a href="'.URL.'carrito"><i class="fas fa-shopping-cart" style="color:#dffce4ff"></i></a>';
        }else{
            return '<a href="'.URL.'carrito"><i class="fas fa-shopping-cart"></i></a>';
        }
    }else{
        return '<a href="'.URL.'login"><i class="fas fa-shopping-cart"></i></a>';
    }
}

function checkLoginAddCarrito(){
    if (isset($_SESSION['login'])&&$_SESSION['login']==true) {
        return 'btn-add-carrito-login';
    }else{
        return 'btn-add-carrito-nologin';
    }
}

function checkLoginAddWishlist(){
    if (isset($_SESSION['login'])&&$_SESSION['login']==true) {
        return 'btn-add-wishlist-login';
    }else{
        return 'btn-add-wishlist-nologin';
    }
}

function checkLoginComprarArticulo(){
    if (isset($_SESSION['login'])&&$_SESSION['login']==true) {
        return 'btn-comprar-articulo';
    }else{
        return 'btn-comprar-articulo-nologin';
    }
}

function checkWishlistItems(){
    if (count($_SESSION['wishlist'])==0) {
        return '<p style="margin:4.2rem;font-size:2.2rem">No hay items en el carrito</p>';
    }
}

function paginadorActivo($i){
    if ($i==$_GET['pagina']) {
        return 'paginador-activo';
    }
}

function paginadorSiguiente($pAnterior,$url){
    if ($_GET['pagina']>1) {
        //'todosProductos?pagina='
        return '<a href="'.URL.$url.$pAnterior.'"><i class="fas fa-angle-double-left"></i></a>';
    }
}

function paginadorAnterior($npaginas,$pSiguiente, $url){
    if ($_GET['pagina']<$npaginas) {
        return '<a href="'.URL.$url.$pSiguiente.'"><i class="fas fa-angle-double-right"></i></a>';
    }
}

function comprobarEstado($estadoActual, $estado){
   if ($estadoActual==6) {
       return 'reclamo';
   }
    if ($estadoActual>$estado||$estadoActual==$estado) {
        return 'completo';
    }
        
}



function comprobarResultadosBusqueda($numResul){
    if ($numResul == 0) {
        return'<p style="margin:4.2rem;font-size:2.2rem">No se han encontrado resultados para tu búsqueda</p>';
    }
}

function comprobarPagarCarritoOItem($accion){
switch ($accion) {
    case 'pagar_carrito':
        return'pagarCarrito';
        break;
    case 'pagar_articulo':
        return'pagarArticulo';
        break;
    case 'pagar_articulo_carrito':
        return'pagarArticulo';
        break;
    default:
        # code...
        break;
}
}
