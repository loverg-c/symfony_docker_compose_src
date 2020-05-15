window.dt = require('../../node_modules/datatables.net-bs/js/dataTables.bootstrap.min');
require('../../node_modules/datatables.net-bs/css/dataTables.bootstrap.min.css');
require('../../node_modules/bootstrap/dist/css/bootstrap.min.css');
require('../../node_modules/bootstrap/dist/js/bootstrap');
require('../../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css');
require('../../node_modules/bootstrap-select/dist/js/bootstrap-select.min');
require('../../node_modules/bootstrap-select/dist/js/i18n/defaults-fr_FR.min');
require('../js/datepicker');


function generateSelectFilter(column, cell, title) {
    let input = $('<select class="form-control input-sm selectpicker" data-live-search="true">' +
        '<option value="">' + title + ' (Tous)</option></select>');
    column.data().unique().sort().each(function (d) {
        input.append('<option value="' + d + '">' + d + '</option>')
    });
    cell.append(input);
    input.selectpicker('refresh');
    return input;
}

function generateTextFilter(column, cell, title) {
    let input = $('<input type="text" class="form-control input-sm" placeholder="' + title + '"/></th>');
    cell.append(input);
    return input;
}

function generateDateFilter(column, cell, title) {
    let input = $('<input type="text" class="form-control input-sm"  data-provide="datepicker" placeholder="' + title + '"/></th>');
    input.datepicker({
        language:'fr',
        format: 'yyyy-mm-dd'
    });
    cell.append(input);
    return input;
}

export function refreshTable(tableContainer, urlGet) {
    fetch(urlGet, {
        method: 'GET'
    })
        .then(res => res.text())
        .then(res => {
            tableContainer.innerHTML = res;
            $('table.dataTable', tableContainer).each(function () {
                initDataTable(this);
            });
        })
}

function buildFilter(tableApi, tableContext, trfilter) {
    $('th', tableContext).each(function (i) {
        let column = tableApi.column(i);
        let input = null;
        let cell = $('<td></td>');
        trfilter.append(cell);
        let filterType = $(this).data('filter-type');
        switch (filterType) {
            case 'text':
                input = generateTextFilter(column, cell, $(this).text());
                break;
            case 'date':
                input = generateDateFilter(column, cell, $(this).text());
                break;
            case 'select':
                input = generateSelectFilter(column, cell, $(this).text());
                break;
        }
        if (input !== null) {
            input.on('keyup change', function () {
                if (column.search() !== this.value) {
                    column.search(this.value).draw();
                }
            });
        }
    });
}

function initDataTable(selector) {
    $(selector).DataTable({
        scrollX: 100,
        language: {
            url: '/build/config/datatable_french.json'
        },

        initComplete: function () {
            let tableApi = this.api();
            let trfilter = $('<tr class="filter-header"></tr>');
            $(tableApi.table().header()).prepend(trfilter);
            buildFilter(tableApi, this, trfilter);
            tableApi.table().draw();
        }
    });
}


function reloadTable(selector) {
    $(selector).reload();
}

$(document).ready(function () {
    initDataTable('.dataTable');
});

window.initDataTable = initDataTable;
window.reloadTable = reloadTable;
