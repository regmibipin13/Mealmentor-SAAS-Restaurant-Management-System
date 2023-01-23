import './bootstrap';

window.Vue = require('vue');

import { createApp } from 'vue';

// Plugins Import
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import axios from 'axios';



// Initializing the vue app
const app = createApp({
    data() {
        return {
            cartCount:0,
        };
    },
});

// importing the components
import Cart from './components/Cart.vue';
import AddToCart from './components/AddToCart.vue';


//Using and defining the components

app.use(Toast);
app.component('cart', Cart);
app.component('add-to-cart', AddToCart);

// Mounting the final app
app.mount('#app');


// Additional scripts here ----



