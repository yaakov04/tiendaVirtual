function notificacionError(mensaje, sE, sS) {
    let modal = new Modal(`
            <div  style="display:flex;justify-content:center">
                <i style="color:red;font-size:20rem" class="fas fa-exclamation-circle"></i>
            </div>
            <p style="color:red;text-align:center;font-size:3.5rem; font-weight:bold">¡¡Error!!</p>
            <p style="color:black;text-align:center;font-weight:bold">${mensaje}</p>
            `);
    modal.openModal();
    modal.setModalTransition();
    modal.openModalTransition(modal, sE);
    setTimeout(() => {
        modal.closeModalTransition(modal, sS);
    }, sS + 5);

}

function notificacionCorrecto(mensaje, sE, sS) {
    let modal = new Modal(`
    <div  style="display:flex;justify-content:center">
        <i style="color:green;font-size:20rem" class="fas fa-check-circle"></i>
    </div>
        <p style="color:green;text-align:center;font-size:3.5rem; font-weight:bold">¡¡Correcto!!</p>
        <p style="color:black;text-align:center;font-weight:bold">${mensaje}</p>
    `);
    modal.openModal();
    modal.setModalTransition();
    modal.openModalTransition(modal, sE);
    setTimeout(() => {
        modal.closeModalTransition(modal, sS);
    }, sS + 5);
}

function notificacionaddItemCarrito(mensaje) {
    let modal = new Modal(`
    <div  style="display:flex;justify-content:center">
        <i style="color:green;font-size:20rem" class="fas fa-cart-plus"></i>
    </div>
        <p style="color:green;text-align:center;font-size:3.5rem; font-weight:bold">¡¡Correcto!!</p>
        <p style="color:black;text-align:center;font-weight:bold">${mensaje}</p>
        <div  style="display:flex;justify-content:space-between">
            <a href="http://localhost/elPuestito/carrito" class="btn btn-modal">Ir al carrito</a>
            <button id="btn-close-modal" class="btn btn-modal">Continuar</button>
        </div>
    `);
    modal.openModal();
    modal.setModalTransition();
    modal.openModalTransition(modal, 150);
    document.querySelector('#btn-close-modal').onclick = function() { modal.closeModalTransition(modal, 300); }
}

function notificacionConfirm(mensaje, funcion) {

    let modal = new Modal(`
    <div  style="display:flex;justify-content:center">
        <i style="color:green;font-size:20rem" class="fas fa-question-circle"></i>
    </div>
    <p style="color: #44f56fff;text-align:center;font-size:3.5rem; font-weight:bold">${mensaje}</p>
    <p style="color:black;text-align:center;font-weight:bold">Esta accion no se puede revertir</p>
        <div  style="display:flex;justify-content:space-between">
            <button id="btn-confirmar-modal" class="btn btn-modal">Confirmar</button>
            <button id="btn-close-modal" class="btn btn-modal">Cancelar</button>
        </div>
    `);

    modal.openModal();
    modal.setModalTransition();
    modal.openModalTransition(modal, 150);
    document.querySelector('#btn-close-modal').onclick = function() { modal.closeModalTransition(modal, 300); }
    let btnconfirmar = document.querySelector('#btn-confirmar-modal');
    btnconfirmar.onclick = function() {
        funcion();
        modal.closeModalTransition(modal, 150);
    }
}