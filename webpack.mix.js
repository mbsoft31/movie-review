const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/dashboard/app.js', 'public/js/dashboard');

mix.sass('resources/sass/movie-single.scss', 'public/css')
mix.sass('resources/sass/dashboard/movie-create.scss', 'public/css')
.sass('resources/sass/tailwind.scss', 'public/css')
.options({
    processCssUrls: false,
    postCss: [ require('tailwindcss')('./tailwind.config.js') ],
})

mix.sourceMaps();

mix.browserSync("fooshar.test");
