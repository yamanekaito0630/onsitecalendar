const mix = require('laravel-mix');
const workboxPlugin = require('workbox-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new workboxPlugin.InjectManifest({
            swSrc: 'public/sw-offline.js',
            swDest: 'sw.js',
            importsDirectory: 'service-worker'
        })
    ]
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.sass('resources/sass/onsitecalendar.scss', 'public/css');
mix.sass('resources/sass/style.scss', 'public/css');
