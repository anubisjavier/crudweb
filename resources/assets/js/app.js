require('./bootstrap');
window.Vue = require('vue');

Vue.component('componente-principal', require('./components/ComponentePrincipal.vue').default);
Vue.component('componente-formulario', require('./components/ComponenteFormulario.vue').default);
Vue.component('componente-tarea', require('./components/ComponenteTarea.vue').default);
var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
});
