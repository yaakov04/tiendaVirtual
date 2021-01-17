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
        }
        if (document.querySelector('#btn-input-number-menos')) {
            let btnInputNumberMas = document.querySelector('#btn-input-number-menos');
            btnInputNumberMas.addEventListener('click', sustraccionInput);
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



    }); //DOM CONTENT LOADED
})();