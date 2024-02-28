import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import HelloVue from './components/HelloVue.vue';

const app = createApp({
    components: {
        'hello-vue': HelloVue,
    }
});

app.mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
