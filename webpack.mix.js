const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/admin/js/app.js', 'public/assets-adm/js')
    .sass('resources/admin/sass/app.scss', 'public/assets-adm/css')
    .sass('resources/admin/sass/login.scss', 'public/assets-adm/css')
    .scripts([
        'resources/admin/js/jquery.mask.min.js',
        'resources/admin/js/init_mask.js',
        'node_modules/toastr/toastr.js',
        //'node_modules/sweetalert2/dist/sweetalert2.js',
        'resources/admin/plugins/typeahead/typeahead.bundle.min.js',
        'resources/admin/plugins/select2/js/select2.full.min.js',
        'resources/admin/plugins/j-pro/js/jquery-cloneya.min.js',
        'resources/admin/plugins/visualization/d3/d3.min.js',
        'resources/admin/plugins/visualization/d3/d3_tooltip.js',
        'resources/admin/plugins/visualization/dimple/dimple.min.js',
        'resources/admin/plugins/slick/slick.min.js',
        'resources/admin/js/meus_scripts.js'
    ], 'public/assets-adm/js/scripts.js')

    .sass('resources/client/assets/sass/app.scss', 'public/assets-client/css')
    .scripts([        
        'resources/client/assets/js/jquery.min.js',        
        'resources/admin/js/jquery.mask.min.js',
        'resources/admin/js/init_mask.js',
        'node_modules/toastr/toastr.js',
        'resources/admin/plugins/typeahead/typeahead.bundle.min.js',         
        'resources/client/assets/js/bootstrap.min.js',   
        'resources/client/assets/js/jquery.scrollex.min.js',
        'resources/client/assets/js/jquery.scrolly.min.js',
        'resources/client/assets/js/browser.min.js',
        'resources/client/assets/js/breakpoints.min.js',
        'resources/client/assets/js/util.js',
        'resources/client/assets/js/jquery.easypiechart.min.js',
        'resources/client/assets/js/main.js'
    ], 'public/assets-client/js/scripts.js')

    .copyDirectory('resources/admin/images', 'public/assets-adm/images')
    .copyDirectory('resources/admin/plugins', 'public/assets-adm/plugins')
    .copyDirectory('resources/client/images', 'public/assets-client/images')
    .copyDirectory('resources/client/icones', 'public/assets-client/icones');
