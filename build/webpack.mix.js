let mix = require('laravel-mix');

mix.setResourceRoot('./');
mix.setPublicPath('../');

mix
    .copy('node_modules/vanilla-cookieconsent/dist/cookieconsent.css', '../css/cookieconsent.css')
    .copy('node_modules/vanilla-cookieconsent/dist/cookieconsent.umd.js', '../js/cookieconsent.js')
