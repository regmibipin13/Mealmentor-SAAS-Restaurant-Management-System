import './bootstrap';

window.Vue = require('vue');

import { createApp } from 'vue';

// Plugins Import
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

import 'laravel-datatables-vite';

// Initializing the vue app
const app = createApp({
    data() {
        return {
            cartCount:0,
        };
    },
    methods:{
        countCart() {
            axios.get('/cart-count')
                .then((response) => {
                    this.cartCount = response.data;
                }).catch((error) => {
                    console.log(error);
                })
        }
    },
    mounted() {
        this.countCart();
    }
});

// importing the components
import Cart from './components/Cart.vue';
import AddToCart from './components/AddToCart.vue';
import Pos from './components/Admin/POS.vue';
import axios from 'axios';


//Using and defining the components

app.use(Toast);
app.component('cart', Cart);
app.component('add-to-cart', AddToCart);
app.component('pos', Pos);

// Mounting the final app
app.mount('#app');


// Additional scripts here ----



