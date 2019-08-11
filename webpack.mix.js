const mix = require('laravel-mix');
const imageminMozjpeg = require('imagemin-mozjpeg');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
require('laravel-mix-eslint');

const browserSyncUrl = 'laravel-soundboard.local';

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
    plugins: [
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            pngquant: {
                quality: '65-80'
            },
            plugins: [
                imageminMozjpeg({
                    quality: 65,
                    maxmemory: 1000 * 512
                })
            ]
        })
    ]
})
.options({
    processCssUrls: false,
    uglify: true,
})
.js('resources/js/app.js', 'public/js')
.eslint({
    enforce: 'pre',
    test: ['js', 'vue'], // will convert to /\.(js|vue)$/ or you can use /\.(js|vue)$/ by itself.
    exclude: ['node_modules','public'], // will convert to regexp and work. or you can use a regular expression like /node_modules/,
    loader: 'eslint-loader',
    options: {
        fix: true,
        cache: false
    }
})
.sass('resources/sass/app.scss', 'public/css')
.sourceMaps()
.version()
.browserSync({
    proxy: browserSyncUrl
});
