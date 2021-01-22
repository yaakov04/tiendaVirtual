if (document.querySelector('.lista-productos') && document.querySelector('.resumen') && document.querySelector('.pagina-carrito')) {
    let carrito = document.querySelector('.lista-productos');
    if (document.querySelectorAll('.producto').length > 0) {
        totalCarrito(carrito, tenerCantidad, tenerPrecio);
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
    precio = parseFloat(precio.replace('$', ''));
    return precio;
}