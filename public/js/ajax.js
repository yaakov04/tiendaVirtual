(function() {
    document.addEventListener('DOMContentLoaded', function() {
        let btnRegistrarse = document.querySelector('#btn-registrarse');
        let btnActualizarCuenta = document.querySelector('#btn-cuenta');

        listeners();

        function listeners() {
            if (btnRegistrarse) {
                btnRegistrarse.addEventListener('click', registrarse);
            }
            if (btnActualizarCuenta) {
                btnActualizarCuenta.addEventListener('click', actualizarDatos);
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
                    let respuesta = JSON.parse(xhr.responseText);
                    console.log(respuesta);
                }
            }

            //enviar
            xhr.send(datos);

        } //peticionAjax


        //Registrarse
        function registrarse(e) {
            e.preventDefault();
            let controller = 'registrarse';
            let metodo = 'registrar';
            let valores = obtenerValoresForm(btnRegistrarse);
            let datos = insertandoDatosFormData(valores);
            //console.log(...datos);
            peticionAjax(controller, metodo, datos);

        } //Registrarse

        function actualizarDatos(e) {
            e.preventDefault();
            let valores = obtenerValoresForm(btnActualizarCuenta);
            //console.log(valores);
        }

        function insertandoDatosFormData(valores) {
            let datos = new FormData();
            for (i = 0; i < valores['llave'].length; i++) {
                datos.append(valores['llave'][i], valores['valor'][i]);
            }
            return datos;
        }

        function obtenerValoresForm(btn) {
            //console.log(btn.parentElement.parentElement);
            let formulario = btn.parentElement.parentElement;
            //console.log(formulario.querySelectorAll('input'));
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





        /*
                function registrarse(e) {
                    e.preventDefault();
                    console.log('click');
                    let datos = new FormData();
                    datos.append('agregar-admin', 'agregar-admin');
                    //peticion ajax
                    const xhr = new XMLHttpRequest();

                    //abrir conexion
                    xhr.open('POST', 'http://localhost/elPuestito/registrarse/registrar', true);
                    //cargar
                    xhr.onload = function() {
                        if (this.status === 200) {
                            let respuesta = JSON.parse(xhr.responseText);
                            console.log(respuesta);
                        }
                    }

                    //enviar
                    xhr.send(datos);

                }
                */ //////////////////




    }); //DOM CONTENT LOADED
})();