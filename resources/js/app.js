import './bootstrap';
import axios from "axios";
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import MyForm from './components/MyForm.vue';

const app = createApp({
    components: {
        MyForm,
    }
});

app.use(axios).mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
