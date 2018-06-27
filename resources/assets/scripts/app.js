import "babel-polyfill"
window.Vue = require('vue')
require('./load-components')

const app = new Vue({
    el: '#app'
})