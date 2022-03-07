const mix = require('laravel-mix');
mix.disableNotifications();

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/intlTelInput.js', 'public/js')
    .js('resources/js/intlTelInputUtils.js', 'public/js')
    .js('resources/js/datePicker', 'public/js')
    .js('resources/js/fullCalendar', 'public/js')
    .js('resources/js/infiniteScroll', 'public/js')
    .js('resources/js/counterButton', 'public/js')
    .js('resources/js/clearTextarea', 'public/js')
    .js('resources/js/passwordChecker', 'public/js')
    .js('resources/js/updateEditComment', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

    mix.postCss('resources/css/main.css', 'public/css')

