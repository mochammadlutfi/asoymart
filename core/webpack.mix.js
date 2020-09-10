const mix = require('laravel-mix');
mix
    /* CSS */
    .sass('resources/sass/main.scss', 'public/assets/css/codebase.css')
    .sass('resources/sass/codebase/themes/corporate.scss', 'public/assets/css/themes/')
    .sass('resources/sass/codebase/themes/earth.scss', 'public/assets/css/themes/')
    .sass('resources/sass/codebase/themes/elegance.scss', 'public/assets/css/themes/')
    .sass('resources/sass/codebase/themes/flat.scss', 'public/assets/css/themes/')
    .sass('resources/sass/codebase/themes/pulse.scss', 'public/assets/css/themes/')

    /* JS */
    .js('resources/js/app.js', 'public/assets/js/laravel.app.js')
    .js('resources/js/codebase/app.js', 'public/assets/js/codebase.app.js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/assets/js/pages/tables_datatables.js')

    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
});
