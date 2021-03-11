(function() {
    document.addEventListener('DOMContentLoaded', function() {
        let btnRegistrarse = document.querySelector('#btn-registrarse');
        let btnActualizarCuenta = document.querySelector('#btn-cuenta');
        let btnIniciarSesion = document.querySelector('#btn-login');
        let btnAddCarrito = document.querySelector('#btn-add-carrito-login');
        let carritoListaArticulos = document.querySelector('.lista-productos');
        let btnAddWishlist = document.querySelector('#btn-add-wishlist-login');
        let btnLogout = document.querySelector('#logout');
        let btnPagar = document.querySelector('#btn-pagar-checkout');
        let btnReclamo = document.querySelector('#btn-reclamo');
        let btnResponderMensaje = document.querySelector('#btn-responder');
        let btnResolverReclamo = document.querySelector('#btn-resolverReclamo');

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
                carritoListaArticulos.addEventListener('click', eliminarArticuloWishlist);
                carritoListaArticulos.addEventListener('click', moverCarrito);
            }
            if (btnAddWishlist) {
                btnAddWishlist.addEventListener('click', addArticuloWishlist);
            }
            if (btnLogout) {
                btnLogout.addEventListener('click', guardarCartWish);
            }
            if (btnPagar) {
                btnPagar.addEventListener('click', pagar)
            }
            if (btnReclamo) {
                btnReclamo.addEventListener('click', reclamar);
            }
            if (btnResponderMensaje) {
                btnResponderMensaje.addEventListener('click', responderMensaje);
            }
            if (btnResolverReclamo) {
                btnResolverReclamo.addEventListener('click', resolverReclamo)
            }

        } //listeners

        let cartSave = false;
        let wishSave = false;
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
                                case 'addArticuloWishlist':
                                    notificacionCorrecto(respuesta.mensaje, 100, 1000)
                                    break
                                case 'eliminarArticuloWishlist':
                                    exitoEliminarArticulo(respuesta.mensaje);
                                case 'actualizarDatosCuenta':
                                    notificacionCorrecto(respuesta.mensaje, 100, 1000);
                                    break
                                case 'guardarCarrito':
                                    cartSave = true;
                                    cerrarSesion(cartSave, wishSave);
                                    break
                                case 'guardarWishlist':
                                    wishSave = true;
                                    cerrarSesion(cartSave, wishSave);
                                    break
                                case 'insertarPedido':
                                    redirecionar();
                                    break
                                case 'levantarReclamo':
                                    exitoReclamar();
                                    break
                                case 'responderMensaje':
                                    exitoResponderMensaje('El mensaje se envio correctamente', respuesta.reclamo)
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
                                    case 'actualizarDatosCuenta':
                                        notificacionError(respuesta.mensaje, 100, 1000)
                                    default:
                                        notificacionError('Hubo un error al realizar esta acción', 100, 850);
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

        function getCarrito(datos) {
            let controller = 'carrito';
            let metodo = 'getCarrito';
            peticionAjax(controller, metodo, datos);
        }

        function getWishlist(datos) {
            let controller = 'wishlist';
            let metodo = 'getWishlist';
            peticionAjax(controller, metodo, datos);
        }

        function exitoLogin() {
            notificacionCorrecto('Inicio de sesion correcto', 100, 800);
            getCarrito(null);
            getWishlist(null);
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
            let datos = insertandoDatosFormData(valores);
            let controller = 'cuenta';
            let metodo = 'ActualizarDatos';
            peticionAjax(controller, metodo, datos);
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

        function addArticuloWishlist() {
            let idArticulo = btnAddCarrito.getAttribute('data-id-articulo');
            let controller = 'wishlist';
            let metodo = 'addArticulo';
            let datos = new FormData;
            datos.append('id_articulo', idArticulo);
            peticionAjax(controller, metodo, datos);
        }

        function eliminarArticuloWishlist(e) {
            e.preventDefault();
            let btn = e.target;
            if (btn.getAttribute('data-accion') == 'eliminar-wishlist') {
                notificacionConfirm('¿Esta seguro de eliminar este articulo del carrito?', eliminar);

                function eliminar() {
                    let idArticulo = btn.getAttribute('data-id-articulo');
                    let controller = 'wishlist';
                    let metodo = 'eliminarArticulo';
                    let datos = new FormData;
                    datos.append('id_articulo', idArticulo);
                    peticionAjax(controller, metodo, datos);
                    eliminarArticuloWishlistHtml(btn);
                } //eliminar
            }
        }

        function moverCarrito(e) {
            e.preventDefault();
            let btn = e.target;
            if (btn.getAttribute('data-accion') == 'mover-carrito') {
                let idArticulo = btn.getAttribute('data-id-articulo');
                console.log(btn.parentElement.parentElement.parentElement.children[0].children[0].children[1].innerText);
                let cantidad = btn.parentElement.parentElement.parentElement.children[0].children[0].children[1].innerText;
                cantidad = parseInt(cantidad.replace('X', ''));
                let controller = 'carrito';
                let metodo = 'artWishlistToCarrito';
                let datos = new FormData;
                datos.append('id_articulo', idArticulo);
                datos.append('cantidad', cantidad);
                peticionAjax(controller, metodo, datos);
                eliminarArticuloWishlistHtml(btn);
            }
        }

        function guardarCartWish(e) {
            e.preventDefault();
            guardarCarrito(null);
            guardarWishlist(null);
        }

        function guardarCarrito(datos) {
            let controller = 'carrito';
            let metodo = 'guardarCarrito';
            peticionAjax(controller, metodo, datos);
        }

        function guardarWishlist(datos) {
            let controller = 'wishlist';
            let metodo = 'guardarWishlist';
            peticionAjax(controller, metodo, datos);
        }

        function pagar(e) {
            e.preventDefault();
            let controller = 'checkout';
            let metodo = btnPagar.getAttribute('data-accion');
            let total = parseFloat(document.querySelector('#total').innerText);
            let valores = obtenerValoresForm(document.querySelector('#confirmar'));
            let datos = insertandoDatosFormData(valores);
            let idArticulo = tenerIdArtCheckout();
            let cantidadArticulo = tenerCantidadArtCheckout();
            datos.append('total', total);
            datos.append('id_articulo', idArticulo);
            datos.append('cantidad_articulo', cantidadArticulo);
            //console.log(...datos);
            peticionAjax(controller, metodo, datos);
        }

        function reclamar(e) {
            e.preventDefault();
            if (camposVaciosForm(btnReclamo)) {
                notificacionError('no puede haber campos vacios', 200, 800);
            } else {
                let controller = 'reclamo';
                let metodo = 'levantarReclamo';
                let valores = obtenerValoresForm(btnReclamo);
                //console.log(valores)
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);
                //console.log(...datos);
                peticionAjax(controller, metodo, datos);
            }
        }

        function exitoReclamar() {
            window.location.href = "http://localhost/elPuestito/reclamo/solicitud_enviada";
        }

        function responderMensaje(e) {
            e.preventDefault();
            if (camposVaciosForm(btnResponderMensaje)) {
                notificacionError('no puede haber campos vacios', 200, 800);
            } else {
                let controller = 'reclamo';
                let metodo = 'responderMensaje';
                let valores = obtenerValoresForm(btnResponderMensaje);
                //console.log(valores)
                let datos = insertandoDatosFormData(valores);
                obteniendoDatosTextarea(datos);
                //console.log(...datos);
                peticionAjax(controller, metodo, datos);
            }
        }

        function exitoResponderMensaje(mensaje, reclamoID) {
            notificacionCorrecto(mensaje, 100, 800);
            setTimeout(() => {
                window.location.href = `http://localhost/elPuestito/reclamo/ver/${reclamoID}`;
            }, 1400);
        }

        function resolverReclamo(e) {
            e.preventDefault();
            let id_reclamo = btnResolverReclamo.getAttribute('data-id-reclamo');
            let id_venta = btnResolverReclamo.getAttribute('data-id-venta');
            let id_pedido = btnResolverReclamo.getAttribute('data-id-pedido');
            let id_mensaje = btnResolverReclamo.getAttribute('data-id-mensaje');
            let controller = 'reclamo';
            let metodo = 'resolverReclamo';
            let datos = new FormData;
            datos.append('id_reclamo', id_reclamo);
            datos.append('id_venta', id_venta);
            datos.append('id_pedido', id_pedido);
            datos.append('id_mensaje', id_mensaje);

            peticionAjax(controller, metodo, datos);

        }
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
            let selects = formulario.querySelectorAll('select');
            let arreglo = new Array();
            let valores = new Array();
            valores['llave'] = new Array();
            valores['valor'] = new Array();
            for (i = 0; i < inputs.length; i++) {
                if (inputs[i].type == 'file') {
                    continue;
                } else {
                    arreglo.push(inputs[i]);
                }
            }
            for (e = 0; e < selects.length; e++) {
                arreglo.push(selects[e]);
            }
            for (a = 0; a < arreglo.length; a++) {
                if (arreglo[a].name === '') {} else {
                    if (arreglo[a].type == 'checkbox') {
                        valores['llave'].push(arreglo[a].name);
                        valores['valor'].push(arreglo[a].checked);
                    } else {
                        valores['llave'].push(arreglo[a].name);
                        valores['valor'].push(arreglo[a].value);
                    }

                }
            }
            return valores;

        }
        //Obteniendo los valores del textarea y los inserta en el formdata
        function obteniendoDatosTextarea(formdata) {
            if (document.querySelectorAll('textarea').length > 0) {
                let textArea = document.querySelectorAll('textarea')[0];
                formdata.append(textArea.name, textArea.value);
            }
        } //function
        //comprueba si hay campos vacios en un formulario
        function camposVaciosForm(btn) {
            let formulario = btn.parentElement.parentElement;
            let inputs = Array.prototype.slice.call(formulario.querySelectorAll('input'));
            let selects = Array.prototype.slice.call(formulario.querySelectorAll('select'));
            let textAreas = Array.prototype.slice.call(formulario.querySelectorAll('textarea'));
            let valor = false;
            inputs = inputs.concat(selects);
            inputs = inputs.concat(textAreas);
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
            }

            return valor;
        } //
        //Elimina el html del item y reinicia el calculo del total
        function eliminarArticuloCarritoHtml(btn) {
            btn.parentElement.parentElement.parentElement.parentElement.remove();
            if (document.querySelectorAll('.producto').length > 0) {
                totalCarrito(document.querySelector('.lista-productos'), tenerCantidad, tenerPrecio);
            } else {
                document.querySelector('.lista-productos').innerHTML = `<p style="margin:4.2rem;font-size:2.2rem">No hay items en el carrito</p>`;
                document.querySelector('.fa-shopping-cart').style.color = '#217535ff';
                let cero = 0;
                document.querySelector('#sub-total').innerText = cero.toFixed(2);
                document.querySelector('#total').innerHTML = cero.toFixed(2);
            }
        }

        function eliminarArticuloWishlistHtml(btn) {
            btn.parentElement.parentElement.parentElement.parentElement.remove();
            if (document.querySelectorAll('.producto').length == 0) {
                document.querySelector('.lista-productos').innerHTML = `<p style="margin:4.2rem;font-size:2.2rem">No hay items en el carrito</p>`;

            }
        }

        function cerrarSesion(carritoSave, wishlistSave) {
            if (carritoSave && wishlistSave) {
                window.location.href = "http://localhost/elPuestito/login?sesion=finalizada";
            } else {
                console.log(carritoSave);
                console.log(wishlistSave);
                console.log('no redireccion');
            }
        }

        function redirecionar() {
            window.location.href = "http://localhost/elPuestito/pagar";
        }

        function tenerIdArtCheckout() {
            if (document.querySelectorAll('.lista-productos')[0].children.length == 1) {
                let item = document.querySelectorAll('.lista-productos')[0].children[0];
                return parseInt(item.querySelector('input').getAttribute('data-id-articulo'));
            }
        }

        function tenerCantidadArtCheckout() {
            if (document.querySelectorAll('.lista-productos')[0].children.length == 1) {
                let item = document.querySelectorAll('.lista-productos')[0].children[0];
                let valor = item.querySelectorAll('.contenedor-txt')[1].innerText;
                valor = parseInt(valor.replace('X', ''));
                return valor;
            }
        }




    }); //DOM CONTENT LOADED
})();