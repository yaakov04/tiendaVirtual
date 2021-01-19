(function() {
    document.addEventListener('DOMContentLoaded', function() {

        if (document.querySelector('.formulario-registrarse')) {
            let formularioRegistrarse = document.querySelector('.formulario-registrarse');
            let btnRegistrarse = document.querySelector('#btn-registrarse');
            btnRegistrarse.onclick = function() { validacionForm(formularioRegistrarse) }
        }

        if (document.querySelector('.formulario-login-contenedor')) {
            let formularioLogin = document.querySelector('.formulario-login-contenedor');
            let btnLogin = document.querySelector('#btn-login');
            btnLogin.onclick = function() { validacionForm(formularioLogin) }
        }

        if (document.querySelector('#btn-input-number-mas')) {
            let btnInputNumberMas = document.querySelector('#btn-input-number-mas');
            btnInputNumberMas.addEventListener('click', adicionInput);
            document.querySelector('input#number').value = 1;
        }
        if (document.querySelector('#btn-input-number-menos')) {
            let btnInputNumberMas = document.querySelector('#btn-input-number-menos');
            btnInputNumberMas.addEventListener('click', sustraccionInput);
        }
        if (document.querySelector('#btn-add-carrito-nologin')) {
            let btnAddCarrito = document.querySelector('#btn-add-carrito-nologin');
            btnAddCarrito.addEventListener('click', notificacionNoLogin)
        }
        if (document.querySelector('.lista-productos')) {
            let carrito = document.querySelector('.lista-productos');
            totalCarrito(carrito);
        }

        function validacionForm(form) {
            let inputs = form.querySelectorAll('input');
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].id == 'btn-registrarse') {

                } else {
                    if (inputs[i].value == '') {
                        inputs[i].classList.add('campo-vacio');
                    } else {
                        inputs[i].classList.remove('campo-vacio');
                    }
                }
            } //for
        } //

        function adicionInput() {

            let inputValue = document.querySelector('input#number').value;
            if (inputValue == '') {
                document.querySelector('input#number').value = 1;
            } else {
                inputValue = parseInt(inputValue);
                document.querySelector('input#number').value = inputValue + 1;
                //console.log(inputValue);
            }
        } //

        function sustraccionInput() {
            let inputValue = document.querySelector('input#number').value;
            if (inputValue == '') {

            } else {
                inputValue = parseInt(inputValue);
                if (inputValue > 0) {
                    document.querySelector('input#number').value = inputValue - 1;
                }
            }
        } //

        function notificacionNoLogin() {
            notificacionError('Necesita inciar sesion para realizar esta acción', 100, 1200);
        } //

        function totalCarrito(carrito) {
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
            console.log(envio);
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





    }); //DOM CONTENT LOADED
})();