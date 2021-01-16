(function() {
    document.addEventListener('DOMContentLoaded', function() {
        let btnRegistrarse = document.querySelector('#btn-registrarse');
        let btnActualizarCuenta = document.querySelector('#btn-cuenta');
        let btnIniciarSesion = document.querySelector('#btn-login');

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
                        //console.log(respuesta);
                        if (respuesta.respuesta == 'exito') {
                            switch (respuesta.tipo) {
                                case 'regitrar':
                                    exitoRegistrarse();
                                    break;
                                case 'login':
                                    exitoLogin();
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






    }); //DOM CONTENT LOADED
})();