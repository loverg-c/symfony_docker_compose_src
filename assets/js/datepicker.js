require('../../node_modules/bootstrap/dist/js/bootstrap');
require('../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker');
require('../../node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.fr.min');
require('../../node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');

$(document).ready(function(){
    $.fn.datepicker.defaults.language = 'fr';
});
