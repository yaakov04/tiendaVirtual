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