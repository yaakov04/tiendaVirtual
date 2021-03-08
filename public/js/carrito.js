if (document.querySelector('.lista-productos') && document.querySelector('.resumen') && document.querySelector('.pagina-carrito')) {
    let carrito = document.querySelector('.lista-productos');
    if (document.querySelectorAll('.producto').length > 0) {
        totalCarrito(carrito, tenerCantidad, tenerPrecio);
    }

}

if (document.querySelector('#btn-pagar-checkout')) {
    let listaCheckout = document.querySelectorAll('.producto');
    if (listaCheckout.length > 0) {
        totalCarrito(listaCheckout, tenerCantidadCheckout, tenerPrecioCheckout);
    }
}

if (document.querySelector('.detallesProducto-productos')) {
    let pedidos = document.querySelectorAll('.producto');
    if (pedidos.length > 0) {
        totalCarrito(pedidos, tenerCantidadDetallesPedido, tenerPrecioDetallesPedido);
    }
}

function totalCarrito(carrito, tenerCantidad, tenerPrecio) {
    let listaItems = document.querySelectorAll('.producto');
    let precios = null;
    let cantidades = null;
    let preciosTotales = new Array();

    for (i = 0; i < listaItems.length; i++) {
        precios = tenerPrecio(listaItems, i);
        cantidades = tenerCantidad(listaItems, i);
        preciosTotales.push(precios * cantidades);
    }


    let subTotal = preciosTotales.reduce((a, b) => a + b);

    document.querySelector('#sub-total').innerText = subTotal.toFixed(2);
    let envio = parseFloat(document.querySelector('#envio').innerText);
    let total = subTotal + envio;
    document.querySelector('#total').innerHTML = total.toFixed(2);

}

function tenerCantidad(listaItems, i) {
    let cantidad = listaItems[i].children[1].children[0].children[0].children[1].innerText;
    cantidad = parseFloat(cantidad.replace('X', ''));
    return cantidad;
}

function tenerPrecio(listaItems, i) {
    let precio = listaItems[i].children[1].children[0].children[1].innerText;
    //precio = parseFloat(precio.replace('$', ''));
    precio = precio.replace('$', '');
    precio = precio.replace(',', '');
    precio = parseFloat(precio);
    console.log(precio)
    return precio;
}
//listaItems[0].children[1].children[0].children[1].children
function tenerPrecioCheckout(listaItems, i) {
    let precio = listaItems[i].children[1].children[0].children[1].children[1].value;
    precio = precio.replace('$', '');
    precio = precio.replace(',', '');
    precio = parseFloat(precio);
    return precio;
}

function tenerCantidadCheckout(listaItems, i) {
    let cantidad = listaItems[i].children[1].children[0].children[1].children[0].innerText;
    cantidad = parseFloat(cantidad.replace('X', ''));
    return cantidad;
}

function tenerCantidadDetallesPedido(listaItems, i) {
    let cantidad = listaItems[i].children[1].children[0].children[1].children[2].value
    return cantidad;
}

function tenerPrecioDetallesPedido(listaItems, i) {
    let precio = listaItems[i].children[1].children[0].children[1].children[3].value;
    return precio;
}