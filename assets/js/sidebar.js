jQuery(document).ready(function () {
    jQuery('.main-sidebar').height(jQuery('#wrapper').outerHeight() - 50);
});
jQuery(document).ajaxComplete(function() {
    jQuery('.main-sidebar').height(jQuery('#wrapper').outerHeight() - 50);
});