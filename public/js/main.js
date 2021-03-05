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
            btnAddCarrito.addEventListener('click', notificacionNoLogin);
        }
        if (document.querySelector('#btn-add-wishlist-nologin')) {
            let btnAddWishlist = document.querySelector('#btn-add-wishlist-nologin');
            btnAddWishlist.addEventListener('click', notificacionNoLogin);
        }
        if (document.querySelector('#pagar-carrito')) {
            let btnPagarCarrito = document.querySelector('#pagar-carrito');
            btnPagarCarrito.addEventListener('click', pagarCarrito)
        }
        if (document.querySelector('.lista-productos')) {
            let carritoListaArticulos = document.querySelector('.lista-productos');
            carritoListaArticulos.addEventListener('click', pagarArticuloCarrito);
        }
        if (document.querySelector('#btn-comprar-articulo')) {
            let btnComprarArticulo = document.querySelector('#btn-comprar-articulo');
            btnComprarArticulo.addEventListener('click', pagarArticulo);
        }
        if (document.querySelector('#btn-comprar-articulo-nologin')) {
            let btnComprarArticulo = document.querySelector('#btn-comprar-articulo-nologin');
            btnComprarArticulo.addEventListener('click', notificacionNoLogin);
        }
        if (document.querySelector('#in_stock')) {
            let artStock = parseInt(document.querySelector('#in_stock').innerHTML);
            console.log(artStock);
        }
        let inputBusqueda = document.querySelector('input#busqueda');
        if (inputBusqueda) {
            inputBusqueda.addEventListener('change', busqueda);
        }
        let contInput = 0;
        if (document.querySelector('#btn-password')) {
            let btnPassword = document.querySelector('#btn-password');
            let newPassword = document.querySelector('#new-password');
            let confirmPassword = document.querySelector('#confirm-password');
            btnPassword.disabled = true;
            validarBtnPassword(btnPassword, newPassword, confirmPassword);

            confirmPassword.addEventListener('input', function() {
                validarPassword(newPassword, confirmPassword, btnPassword);
            });
            newPassword.addEventListener('input', function() {
                console.log(contInput)
                if (contInput > 0) {
                    validarPassword(newPassword, confirmPassword, btnPassword);
                }
            });
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
            let artStock = parseInt(document.querySelector('#in_stock').innerHTML);
            let inputValue = document.querySelector('input#number').value;
            if (inputValue < artStock) {
                if (inputValue == '') {
                    document.querySelector('input#number').value = 1;
                } else {
                    inputValue = parseInt(inputValue);
                    document.querySelector('input#number').value = inputValue + 1;
                    //console.log(inputValue);
                }
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

        function notificacionNoLogin(e) {
            e.preventDefault();
            notificacionError('Necesita inciar sesion para realizar esta acción', 100, 1200);
        } //

        function pagarCarrito() {
            if (document.querySelectorAll('.producto').length > 0) {
                window.location.href = "http://localhost/elPuestito/checkout?pagar=true&accion=pagar_carrito#confirma_direccion";
            } else {
                notificacionError('No hay items en el carrito', 100, 1200);
            }
        }

        function pagarArticuloCarrito(e) {
            let btn = e.target;
            if (btn.getAttribute('data-accion') == 'pagar-articulo') {
                let idArticulo = btn.getAttribute('data-id-articulo');
                window.location.href = `http://localhost/elPuestito/checkout?id_articulo=${idArticulo}&pagar=true&accion=pagar_articulo_carrito#confirma_direccion`;
            }
        }

        function pagarArticulo(e) {
            e.preventDefault();
            let btn = document.querySelector('#btn-comprar-articulo');
            let idArticulo = btn.getAttribute('data-id-articulo');
            //console.log(btn.parentElement.parentElement.parentElement.children[1].children[5].children[0].children[1].value)
            let cantidad = btn.parentElement.parentElement.parentElement.children[1].children[5].children[0].children[1].value;
            window.location.href = `http://localhost/elPuestito/checkout?id_articulo=${idArticulo}&cantidad=${cantidad}&pagar=true&accion=pagar_articulo#confirma_direccion`

        }

        function validarBtnPassword(btn, newP, conP) {
            if (btn.disabled && newP.value == '' && conP.value == '') {
                btn.style.backgroundColor = '#61c178';
                btn.style.color = '#80de97';
            }
        }

        function validarPassword(newPassword, confirmPassword, btnPassword) {
            contInput = 1;

            if (!(newPassword.value == '' || confirmPassword == '')) {
                if (newPassword.value == confirmPassword.value) {
                    borderGreen();
                } else {
                    borderRed();
                }
            } else {
                borderRed();
            }

            function borderRed() {
                newPassword.style.border = '1px solid red';
                confirmPassword.style.border = '1px solid red';
                btnPassword.disabled = true;
                btnPassword.style.backgroundColor = '#61c178';
                btnPassword.style.color = '#80de97';
            }

            function borderGreen() {
                newPassword.style.border = '1px solid #217535';
                confirmPassword.style.border = '1px solid #217535';
                btnPassword.disabled = false;
                btnPassword.style.backgroundColor = '#37c258';
                btnPassword.style.color = '#ffffff';
            }
        }

        function busqueda(e) {
            let buscar = this.value;
            window.location.href = `http://localhost/elPuestito/consultas/busqueda/${buscar}`;
        }




    }); //DOM CONTENT LOADED
})();

//JQuery
if (document.querySelector('#table_id')) {
    $(function() {

        $(document).ready(function() {
            $('#table_id').DataTable();
        });

    });
}