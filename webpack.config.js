var Encore = require('@symfony/webpack-encore');
var CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
// directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .addEntry('backoffice/common/app', './assets/js/app.js')
    .addEntry('backoffice/common/login_page', './assets/js/login_page.js')
    .addEntry('backoffice/common/table', './assets/js/table.js')
    .addEntry('backoffice/common/datepicker', './assets/js/datepicker.js')
    .addEntry('backoffice/common/modal', './assets/js/modal.js')
    .addEntry('backoffice/common/wysiwyg', './assets/js/wysiwyg.js')
    .addEntry('backoffice/common/routing', './assets/js/routing.js')
    .addEntry('backoffice/common/routing_schema', './assets/config/fos_js_routes.json')
    .addEntry('backoffice/users/index', './assets/js/users/index.js')
    .addEntry('backoffice/helps/index', './assets/js/helps/index.js')
    .addEntry('backoffice/helps/form', './assets/js/helps/form.js')
    .addEntry('pdf/common', './assets/js/pdf/common.js')
    .addEntry('datepicker', './assets/js/datepicker.js')
    .copyFiles({
        from: './assets/img',
        to: 'img/[path][name].[ext]'
    })
    .copyFiles({
        from: './assets/config',
        to: 'config/[path][name].[ext]',
        pattern: /datatable_french.json$/
    })
    .copyFiles({
        from: './',
        to: 'documentation/[name].[ext]',
        pattern: /.md$/,
        includeSubdirectories: false,
    })
    .addEntry('custom-swagger-styles', './assets/js/custom-swagger-styles.js')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())


    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes()

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()
    .addPlugin(new CopyWebpackPlugin([
        // Copy the skins from tinymce to the build/skins directory
        {from: 'node_modules/tinymce/skins', to: 'skins'},
    ]))
// uncomment if you use API Platform Admin (composer req api-admin)
//.enableReactPreset()
//.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
