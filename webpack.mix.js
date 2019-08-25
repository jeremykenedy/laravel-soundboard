const mix = require('laravel-mix');
const imageminMozjpeg = require('imagemin-mozjpeg');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const browserSyncUrl = 'laravel-soundboard.local';
require('laravel-mix-eslint');

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

varFrontEndScripts = [
    'resources/js/app.js',
];
var adminScripts = [
    'resources/js/admin.js',
    'public/argon/vendor/jquery/dist/jquery.min.js',
    'public/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'public/argon/js/argon.js',
];

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
.js(varFrontEndScripts, 'public/js/app.js')
.js(adminScripts, 'public/js/admin.js')
// .eslint({
//     enforce: 'pre',
//     test: ['js', 'vue'], // will convert to /\.(js|vue)$/ or you can use /\.(js|vue)$/ by itself.
//     exclude: ['node_modules','public'], // will convert to regexp and work. or you can use a regular expression like /node_modules/,
//     loader: 'eslint-loader',
//     options: {
//         fix: true,
//         cache: false
//     }
// })
.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    Popper: 'popper.js/dist/umd/popper.js'
})
.copy('resources/images', 'public/images', true)
.sass('resources/sass/app.scss', 'public/css')
.sass('resources/sass/filemanager.scss', 'public/css')
.sourceMaps()
.version();
// .browserSync({
//     proxy: browserSyncUrl
// });
