// noinspection JSAnnotator
let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/product.js', 'public/js')
    .js('resources/assets/js/mobapp.js', 'public/js')
    .js('resources/assets/js/blog.js', 'public/js')
    .js('resources/assets/js/admin-app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/cart.scss', 'public/css')
    .sass('resources/assets/sass/admin-app.scss', 'public/css')
    .sass('resources/assets/sass/bootstrap.scss', 'public/css')
    .sass('resources/assets/sass/blog.scss', 'public/css')
    .sass('resources/assets/sass/product.scss', 'public/css')
    .sass('resources/assets/sass/mobapp.scss', '../public_mob/css')
    .copy('public/css/product.css', 'public_mob/css/')
    .copy('public/css/cart.css', 'public_mob/css/')
    .copy('public/css/bootstrap.css', 'public_mob/css/')
    .copy('public/css/blog.css', 'public_mob/css/')
    .copy('public/js/app.js', 'public_mob/js/')
    .copy('public/js/mobapp.js', 'public_mob/js/')
    .copy('public/js/product.js', 'public_mob/js/')
    .copy('public/js/blog.js', 'public_mob/js/');

// Media-Manager
require('dotenv').config()
mix.sass('resources/assets/vendor/MediaManager/sass/media-' + process.env.MIX_MM_FRAMEWORK + '.scss', 'public/assets/vendor/MediaManager/style.css').version();