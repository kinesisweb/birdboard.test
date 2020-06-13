const mix = require("laravel-mix");

const VuetifyLoaderPlugin = require("vuetify-loader/lib/plugin");
const CaseSensitivePathsPlugin = require("case-sensitive-paths-webpack-plugin");

const webpackConfig = {
    plugins: [new VuetifyLoaderPlugin(), new CaseSensitivePathsPlugin()],
    output: {
        chunkFilename: "js/[name].js"
    }
};

mix.webpackConfig(webpackConfig);

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

mix.js("resources/js/main.js", "public/js");
mix.sass("resources/sass/main.scss", "public/css");
