var elixir = require('laravel-elixir');
//elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .sass('manage.scss');

    mix.scripts([
        'jquery.min.js',
        'jquery.banner.js',
        'dropzone.js'
    ], 'public/js/app.js');

    mix.scripts([
        'jquery.min.js',
        'dropzone.js'
    ], 'public/js/manage.js');

    mix.version([
        'css/app.css',
        'css/manage.css',
        'js/app.js',
        'js/manage.js'
    ]);
});
