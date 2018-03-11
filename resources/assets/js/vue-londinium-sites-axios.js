window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.component('site-search', require('./components/SiteSearch'));

const app = new Vue({
    el: '#app'
});
