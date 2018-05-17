let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.sass', 'public/css').options({
//     	processCssUrls: false, postCss:[ tailwindcss('./tailwind.js') ],
// 	});

mix.js('resources/assets/js/app.js', 'public/js')
   .postCss('resources/assets/sass/main.css', 'public/css', [
        tailwindcss('tailwind.js'),
   ]);