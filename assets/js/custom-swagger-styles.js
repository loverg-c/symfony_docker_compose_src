require('../css/custom-swagger-styles.css');
document.addEventListener('DOMContentLoaded', function() {


    window.onload = () => {
        const data = JSON.parse(document.getElementById('swagger-data').innerText);
        const ui = SwaggerUIBundle({
            spec: data.spec,
            dom_id: '#swagger-ui',
            validatorUrl: null,
            docExpansion: "none",
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: 'StandaloneLayout'
        });

        window.ui = ui;
    };
}, false);
