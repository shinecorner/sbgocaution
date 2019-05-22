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

  mix.autoload({
    'jquery': ['$', 'window.jQuery', 'jQuery'],
})

mix.webpackConfig({
    resolve: {
        alias: {
        	'Api': path.resolve(__dirname, 'resources/js/api/'),
            'WebServices': path.resolve(__dirname, 'resources/js/webServices/'),
        	'Components': path.resolve(__dirname, 'resources/js/components/'),
        	'Constants': path.resolve(__dirname, 'resources/js/constants/'),
        	'Container': path.resolve(__dirname, 'resources/js/container/'),
        	'Views': path.resolve(__dirname, 'resources/js/views/'),
        	'Helpers': path.resolve(__dirname, 'resources/js/helpers/'),
        	'Themes': path.resolve(__dirname, 'resources/js/themes/')
        }
    },
    output: {
        chunkFilename: 'js/chunks/[name].js',
    }
});

mix.js('resources/js/main.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/laravel/js/app.js', 'public/Login/assets/js/laravel/app.js')
    .sass('resources/gull/assets/styles/sass/themes/lite-purple.scss', 'public/Login/assets/styles/css/themes/lite-purple.min.css');
    // .sass('resources/gull/assets/styles/sass/themes/lite-blue.scss', 'public/Login/assets/styles/css/themes/lite-blue.min.css')
    // .sass('resources/gull/assets/styles/sass/themes/dark-purple.scss', 'public/Login/assets/styles/css/themes/dark-purple.min.css');

   mix.combine([
       'node_modules/jquery/dist/jquery.min.js',
       'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
       'resources/gull/assets/js/vendor/perfect-scrollbar.min.js',
   ], 'public/Login/assets/js/common-bundle-script.js');

   mix.js([

       'resources/gull/assets/js/script.js',

   ], 'public/Login/assets/js/script.js');
