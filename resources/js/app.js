import './bootstrap';
import { createApp } from 'vue';


import './store';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);


app.mount('#app');
app.use(store);
