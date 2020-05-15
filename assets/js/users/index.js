import {refreshTable} from "../table";

const routes = require('../../config/fos_js_routes.json');
import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

function deleteUserAction(that) {
    let overlay = $('<div class="overlay"><i class="fas fa-refresh fa-spin"></i></div>');
    $(that).append(overlay);
    let id = that.getAttribute('data-id-to-delete');
    let tableContainer = document.getElementById('user-list');
    if (typeof id !== "undefined" && id !== '') {
        let url = Routing.generate('backoffice_users_delete', {id: id});
        fetch(url, {
            method: 'DELETE'
        }).then(res => {
            $('.box', tableContainer).append(overlay);
            $(that).remove('.overlay');
            document.getElementById('modal-delete-button-close').click();
            let urlGet = Routing.generate('backoffice_users_list');
            refreshTable(tableContainer, urlGet);
        });
    }
}

window.deleteUserAction = deleteUserAction;
