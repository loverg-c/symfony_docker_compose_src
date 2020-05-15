function initModal(modaltype, id, buttonid, modaltext) {
    document.getElementById('modal-' + modaltype + '-dynamic-text')
        .innerHTML = modaltext;
    if(buttonid !== null) {
        document.getElementById(buttonid).setAttribute('data-id-to-' + modaltype, id);
    }
}


function initAll() {
    console.log('Hello Webpack Encore! Edit me in assets/js/modal.js');

    let modalcalls = document.querySelectorAll('.modal-call');

    for (var i = 0; i < modalcalls.length; i++) {
        modalcalls[i].onclick = function (e) {
            e = e.target;

            initModal(
                e.getAttribute('data-modal-type'),
                e.getAttribute('data-modal-entity-id'),
                e.getAttribute('data-button-id'),
                e.parentNode.parentElement.getAttribute('data-modal-text')
            );
        }
    }
}

initAll();

module.exports = {
    initModal,
    initAll
};

window.initModal = initModal;