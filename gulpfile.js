const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(function (mix) {
    mix.sass('app.scss')
        .styles('libs/sweetalert.css' , './public/css/sweetalert.css')
        .styles('libs/dropzone.css' , './public/css/dropzone.css')
        .scripts('libs/sweetalert-dev.js', './public/js/sweetalert.js')
        .scripts('custom.js', './public/js/custom.js')
        .scripts('libs/dropzone.js', './public/js/dropzone.js');
});

