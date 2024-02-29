import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import MyForm from './components/MyForm.vue';

const app = createApp({});
app.component('my-form', MyForm);
app.mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
