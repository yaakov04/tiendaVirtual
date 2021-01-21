(function() {
    document.addEventListener('DOMContentLoaded', function() {
        let btnRegistrarse = document.querySelector('#btn-registrarse');
        let btnActualizarCuenta = document.querySelector('#btn-cuenta');
        let btnIniciarSesion = document.querySelector('#btn-login');
        let btnAddCarrito = document.querySelector('#btn-add-carrito-login');
        let carritoListaArticulos = document.querySelector('.lista-productos');


        listeners();

        function listeners() {
            if (btnRegistrarse) {
                btnRegistrarse.addEventListener('click', registrarse);
            }
            if (btnActualizarCuenta) {
                btnActualizarCuenta.addEventListener('click', actualizarDatos);
            }
            if (btnIniciarSesion) {
                btnIniciarSesion.addEventListener('click', iniciarSesion);
            }
            if (btnAddCarrito) {
                btnAddCarrito.addEventListener('click', addArticuloCarrito)
            }
            if (carritoListaArticulos) {
                carritoListaArticulos.addEventListener('click', eliminarArticulo);
                carritoListaArticulos.addEventListener('click', moverWishlist);
            }

        } //listeners


        //Ajax
        function peticionAjax(controller, metodo, datos) {
            //peticion ajax
            const xhr = new XMLHttpRequest();

            //abrir conexion
            xhr.open('POST', `http://localhost/elPuestito/${controller}/${metodo}`, true);
            //cargar
            xhr.onload = function() {
                    if (this.status === 200) {
                        respuesta = JSON.parse(xhr.responseText);
                        console.log(respuesta);
                        if (respuesta.respuesta == 'exito') {
                            switch (respuesta.tipo) {
                                case 'regitrar':
                                    exitoRegistrarse();
                                    break;
                                case 'login':
                                    exitoLogin();
                                    break
                                case 'addArticuloCarrito':
                                    exitoAddArticuloCarrito(respuesta.mensaje);
                                    break
                                case 'eliminarArticulo':
                                    exitoEliminarArticulo(respuesta.mensaje);
                                    break
                                case 'moverAlWishlist':
                                    notificacionCorrecto(respuesta.mensaje, 100, 800);
                                    break
                                default:
                                    break;
                            }
                        } else {
                            //Error
                            if (respuesta.respuesta == 'error') {
                                switch (respuesta.tipo) {
                                    case 'regitrar':
                                        errorRegistrarse();
                                        break;
                                    case 'login':
                                        errorLogin();
                                        break

                                    default:
                                        break;
                                }
                            }

                        }
                    } //status 200
                } //onload

            //enviar
            xhr.send(datos);


        }


        //Registrarse
        function registrarse(e) {
            e.preventDefault();
            if (camposVaciosForm(btnRegistrarse)) {
                notificacionError('no puede haber campos vacios', 100, 800);
            } else {
                let controller = 'registrarse';
                let metodo = 'registrar';
                let valores = obtenerValoresForm(btnRegistrarse);
                let datos = insertandoDatosFormData(valores);
                //console.log(...datos);
                peticionAjax(controller, metodo, datos);
            }
        }

        function exitoRegistrarse() {
            notificacionCorrecto('registro exitoso', 100, 800);
            setTimeout(() => {
                window.location.href = "http://localhost/elPuestito/login";
            }, 850);
        }

        function errorRegistrarse() {
            notificacionError('Hubo un error en la base de datos o el usuario ya existe', 100, 1200);
        }

        //Inicia sesión
        function iniciarSesion(e) {
            e.preventDefault();
            if (camposVaciosForm(btnIniciarSesion)) {
                notificacionError('no puede haber campos vacios', 200, 800);
            } else {
                let controller = 'login';
                let metodo = 'iniciarSesion';
                let valores = obtenerValoresForm(btnIniciarSesion);
                let datos = insertandoDatosFormData(valores);
                peticionAjax(controller, metodo, datos);
            }
        }

        function exitoLogin() {
            notificacionCorrecto('Inicio de sesion correcto', 100, 800);
            setTimeout(() => {
                window.location.href = "http://localhost/elPuestito/Main";
            }, 850);
        }

        function errorLogin() {
            notificacionError('El usuario no existe o la contraseña es incorrecta', 100, 1200);

        }

        //Actualiza datos de cuenta
        function actualizarDatos(e) {
            e.preventDefault();
            let valores = obtenerValoresForm(btnActualizarCuenta);
            //console.log(valores);
        }

        //Agrega articulos al carrito
        function addArticuloCarrito(e) {
            let idArticulo = btnAddCarrito.getAttribute('data-id-articulo');
            let controller = 'carrito';
            let metodo = 'addArticulo';
            let datos = new FormData;
            datos.append('id_articulo', idArticulo);
            peticionAjax(controller, metodo, datos);
        }

        function exitoAddArticuloCarrito(mensaje) {
            notificacionaddItemCarrito(mensaje);
            let cartIcon = document.querySelector('i.fa-shopping-cart');
            cartIcon.style.color = "#dffce4ff"
        }
        //Elimina articulos del carrito
        function eliminarArticulo(e) {
            e.preventDefault();
            let btn = e.target;
            if (btn.getAttribute('data-accion') == 'eliminar') {
                notificacionConfirm('¿Esta seguro de eliminar este articulo del carrito?', eliminar);

                function eliminar() {
                    let idArticulo = btn.getAttribute('data-id-articulo');
                    let controller = 'carrito';
                    let metodo = 'eliminarArticulo';
                    let datos = new FormData;
                    datos.append('id_articulo', idArticulo);
                    peticionAjax(controller, metodo, datos);
                    //console.log(btn.parentElement.parentElement.parentElement.parentElement);
                    eliminarArticuloCarritoHtml(btn);
                } //eliminar
            }

        } //function
        function exitoEliminarArticulo(mensaje) {
            notificacionCorrecto(mensaje, 100, 800);
        }

        function moverWishlist(e) {
            e.preventDefault();
            let btn = e.target;
            if (btn.getAttribute('data-accion') == 'mover-wishlist') {
                let idArticulo = btn.getAttribute('data-id-articulo');
                //console.log(btn.parentElement.parentElement.parentElement.children[0].children[0].children[1].innerText);
                let cantidad = btn.parentElement.parentElement.parentElement.children[0].children[0].children[1].innerText;
                cantidad = parseInt(cantidad.replace('X', ''));
                let controller = 'wishlist';
                let metodo = 'artCarritoToWishlist';
                let datos = new FormData;
                datos.append('id_articulo', idArticulo);
                datos.append('cantidad', cantidad);
                peticionAjax(controller, metodo, datos);
                eliminarArticuloCarritoHtml(btn);
            }
        } //

        ///////////////////////////////////////////////////////////////
        //crea el formdata de los valores obtenidos de un formulario para el ajax
        function insertandoDatosFormData(valores) {
            let datos = new FormData();
            for (i = 0; i < valores['llave'].length; i++) {
                datos.append(valores['llave'][i], valores['valor'][i]);
            }
            return datos;
        }
        //obtiene los valores de un formulario
        function obtenerValoresForm(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = formulario.querySelectorAll('input');
            let arreglo = new Array();
            let valores = new Array();
            valores['llave'] = new Array();
            valores['valor'] = new Array();

            for (i = 0; i < inputs.length; i++) {
                arreglo.push(inputs[i]);
            }
            //console.log(arreglo);
            for (a = 0; a < arreglo.length; a++) {
                if (arreglo[a].name === '') {

                } else {
                    valores['llave'].push(arreglo[a].name);
                    valores['valor'].push(arreglo[a].value);
                }

            }

            return valores;

        }
        //comprueba si hay campos vacios en un formulario
        function camposVaciosForm(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = formulario.querySelectorAll('input');
            let valor = false;
            //console.log(inputs);
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].id == 'btn-registrarse') {

                } else {
                    if (inputs[i].value == '') {
                        //console.log('campo vacio');
                        valor = true;
                        i = inputs.length + 1;
                    }
                }
            } //for
            return valor
        } //

        function eliminarArticuloCarritoHtml(btn) {
            btn.parentElement.parentElement.parentElement.parentElement.remove();
            if (document.querySelectorAll('.producto').length > 0) {
                totalCarrito(document.querySelector('.lista-productos'));
            } else {
                document.querySelector('.lista-productos').innerHTML = `<p style="margin:4.2rem;font-size:2.2rem">No hay items en el carrito</p>`;
                document.querySelector('.fa-shopping-cart').style.color = '#217535ff';
                let cero = 0;
                document.querySelector('#sub-total').innerText = cero.toFixed(2);
                document.querySelector('#total').innerHTML = cero.toFixed(2);
            }
        }




    }); //DOM CONTENT LOADED
})();