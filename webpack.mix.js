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

mix.js('resources/js/main.js', 'public/js')
   .js('resources/js/jquery.min.js', 'public/js')
    .sass('resources/sass/style.scss', 'public/css')
    .copy('resources/font', 'public/font')
    .copy('node_modules/slick-slider/slick/slick.min.js', 'public/js')
    .copy('node_modules/slick-slider/slick/slick.css', 'public/css')
    .copy('node_modules/slick-slider/slick/slick-theme.css', 'public/css')
    .copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/fontawesome')
    .copy('node_modules/font-awesome/css/font-awesome.css', 'public/fontawesome')
    .options({
        processCssUrls: false
    });
