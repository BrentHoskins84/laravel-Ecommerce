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

mix.js(
    [
        'resources/js/app.js',
        'resources/js/theme/util.js',
        'resources/js/theme/main.js',
    ], 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .browserSync('pocketpc.test');
