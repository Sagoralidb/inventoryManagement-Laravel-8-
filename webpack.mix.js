const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()  // This line ensures .vue files are processed correctly
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
