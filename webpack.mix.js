const mix = require("laravel-mix");

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

mix.webpackConfig({
    stats: {
        children: true, // Enable detailed stats for child compilations
    },
});

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import")({
            path: ["resources/css"],
        }),
        require("tailwindcss"),
        require("postcss-nested"),
        require("autoprefixer"),
    ])
    .options({
        processCssUrls: false,
    });

if (mix.inProduction()) {
    mix.version();
}
