let tinymce = require('../../node_modules/tinymce/tinymce');
require('../../node_modules/tinymce/themes/silver/theme');

require('../../node_modules/tinymce/plugins/image');
require('../../node_modules/tinymce/plugins/imagetools');
require('../../node_modules/tinymce/plugins/searchreplace');
require('../../node_modules/tinymce/plugins/autolink');
require('../../node_modules/tinymce/plugins/image');
require('../../node_modules/tinymce/plugins/link');
require('../../node_modules/tinymce/plugins/media');
require('../../node_modules/tinymce/plugins/table');
require('../../node_modules/tinymce/plugins/hr');
require('../../node_modules/tinymce/plugins/pagebreak');
require('../../node_modules/tinymce/plugins/nonbreaking');
require('../../node_modules/tinymce/plugins/anchor');
require('../../node_modules/tinymce/plugins/advlist');
require('../../node_modules/tinymce/plugins/lists');
require('../../node_modules/tinymce/plugins/wordcount');
require('../../node_modules/tinymce/plugins/imagetools');
require('../../node_modules/tinymce/plugins/textpattern');
require('../../node_modules/tinymce/plugins/help');

$(document).ready(function () {

// Initialize the app
    tinymce.init({
        selector: '.wysiwyg',
        plugins: 'image imagetools searchreplace autolink image link media table hr pagebreak nonbreaking anchor advlist lists wordcount imagetools textpattern help',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
        height: 400,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {text: 'My text'});
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {alt: 'My alt text'});
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg'});
            }
        },
        image_caption: true,
    });
})
;
