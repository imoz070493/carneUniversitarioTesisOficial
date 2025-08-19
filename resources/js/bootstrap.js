window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// try {
//     window.Popper = require('popper.js').default;
//     window.$ = window.jQuery = require('jquery');

//     require('bootstrap');
// } catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.now = function(withoutTime){
    let date = '';
    date = new Date().toLocaleDateString().split('/').reverse().join('-');

    if(!withoutTime){
        date += ' ' + new Date().toLocaleTimeString();
    }

    return date;
}

window.formatDate = function(objectDate){
    let date = '';
    date = objectDate.toLocaleDateString().split('/').reverse().join('-');

    return date;
}

window.numberFormat = function(number){
    return parseFloat(number).toFixed(2);
}

window.numberFormat2 = function(number){
    if(parseFloat(number)==NaN) return parseFloat(number);

    let longitud = String(parseFloat(number).toFixed(2)).length;
    let number_string = String(parseFloat(number).toFixed(2));//console.log('longitud',longitud)
    let number_rest = longitud - 6;
    let indice = 0;
    let new_number = '';

    if(number_rest <= 0) return parseFloat(number).toFixed(2);

    if(number_rest%3 != 0){
        new_number = number_string.substr(indice, number_rest%3)+' ';
        indice += number_rest%3;
    }
    
    // console.log('number_rest',number_rest)
    while(indice < number_rest){
        new_number += number_string.substr(indice,3)+' ';
        indice += 3;
    }

    return new_number+number_string.substr(indice,6);
}

window.isNumeric=function (n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

 import Echo from 'laravel-echo';

 window.Pusher = require('pusher-js');
 
 window.Echo = new Echo({
     broadcaster: 'pusher',
     // key: process.env.MIX_PUSHER_APP_KEY,
     // cluster: process.env.MIX_PUSHER_APP_CLUSTER,
     key: 'f04c940ba4fa63dd61e0',
     cluster: 'us2',
     encrypted: true
 });
