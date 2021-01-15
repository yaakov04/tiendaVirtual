function Modal(html, ) {
    //console.log('constuct');

    this.modalContainer = document.createElement('div');
    this.modalContent = document.createElement('div');

    this.html = html;

    this.htmlModal = function() {
        this.modalContainer.id = 'modal-container';
        this.modalContainer.classList.add('modal-container');

        this.modalContent.classList.add('modal-content');
        this.modalContainer.appendChild(this.modalContent);

        this.modalContent.innerHTML = this.html


    }

    this.openModal = function() {
        this.htmlModal();
        document.body.appendChild(this.modalContainer);
        document.body.style.overflow = 'hidden';
        //this.modalContent.classList.add('modal-content-transition');

    }
    this.closeModal = function() {
        this.modalContainer.remove();
        document.body.style.overflow = 'auto';
    }

    this.setModalTransition = function() {
        this.modalContent.style.opacity = 0;
    }

    this.openModalTransition = function(x, y) {
        setTimeout(function() {
            x.modalContent.style.opacity = 1;
        }, y);
    }
    this.closeModalTransition = function(x, y) {
        x.modalContent.style.opacity = 0;

        setTimeout(function() {
            x.closeModal();
        }, y);

    }

}