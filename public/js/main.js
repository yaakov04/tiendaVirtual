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
        }



    }); //DOM CONTENT LOADED
})();