import {refreshTable} from "../table";

require('../../../node_modules/bootstrap-toggle/js/bootstrap-toggle.js');
require('../../../node_modules/bootstrap-toggle/css/bootstrap-toggle.min.css');

const routes = require('../../config/fos_js_routes.json');
import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

function deleteHelpAction(that) {
    let overlay = $('<div class="overlay"><i class="fas fa-refresh fa-spin"></i></div>');
    $(that).append(overlay);
    let id = that.getAttribute('data-id-to-delete');
    let tableContainer = document.getElementById('help-list');
    if (typeof id !== "undefined" && id !== '') {
        let url = Routing.generate('backoffice_helps_delete', {id: id});
        fetch(url, {
            method: 'DELETE'
        }).then(res => {
            $('.box', tableContainer).append(overlay);
            $(that).remove('.overlay');
            document.getElementById('modal-delete-button-close').click();
            let urlGet = Routing.generate('backoffice_helps_list');
            refreshTable(tableContainer, urlGet);
        });
    }
}

function activeHelpAction(that, id) {
    let url = Routing.generate('backoffice_helps_activate', {id: id});
    let tr = $(that).parents('tr');
    tr.addClass('loading');
    fetch(url, {
        method: 'PATCH'
    }).then(res => {
        tr.removeClass('loading');
        that.prop('checked', res.status).change();
    });

}

window.deleteHelpAction = deleteHelpAction;
window.activeHelpAction = activeHelpAction;
