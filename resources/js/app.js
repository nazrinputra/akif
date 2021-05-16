import './bootstrap';
import './acw';
import Vue from 'vue';
import Turbolinks from 'turbolinks';
import TurbolinksAdapter from 'vue-turbolinks';

Turbolinks.start();
Vue.use(TurbolinksAdapter);
Vue.component('test', {
    template: 'components.Test.vue'
});

document.addEventListener('turbo:load', () => {
    const element = document.getElementById("app");

    if (element != null) {
    
        const app = new Vue({
            el: element,
            // template: '<App/>',
            // components: { App }
        });
    }
});