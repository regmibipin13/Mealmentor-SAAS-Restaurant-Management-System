<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Your Cart</h3>
                <span class="text-secondary">You have {{ cart.items.length }} items in your cart</span>
            </div>
            <div class="col-md-8">
                <hr>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 pt-2 pb-3" v-for="(item, index) in cart.items" :key="index">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-3">
                                        <img :src="item.photo" :alt="item.name" width="150" height="100"
                                            style="object-fit: cover;">
                                    </div>

                                    <div class="col-md-5">
                                        <h3>{{ item.name }}</h3>
                                        <span>{{ item.pivot.quantity }} * Rs.{{ item.pivot.price }}</span>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between">
                                        <button class="btn btn-sm btn-primary"
                                            @click="changeQuantity(item, item.pivot.quantity + 1, index)">+</button>
                                        <input type="text" disabled style="width: 60px; text-align:center;"
                                            :value="item.pivot.quantity">
                                        <button class="btn btn-sm btn-primary"
                                            @click="changeQuantity(item, item.pivot.quantity - 1, index)">-</button>
                                    </div>

                                    <div class="col-md-2">
                                        <button class="btn btn-sm btn-danger"
                                            @click="removeFromCart(item, index)">Remove <i
                                                class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pt-2 pb-3" v-if="!cart.items.length">
                        <span>No Items in Cart</span>
                    </div>

                </div>
            </div>

            <div class="col-md-4" v-if="cart.items.length">
                <div class="card">
                    <div class="card-header">
                        Cart Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product, key in cart.items" :key="key">
                                    <td>{{ product.name }} * {{ product.pivot.quantity }}</td>
                                    <td>Rs. {{ product.pivot.price * product.pivot.quantity }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Address</label>
                                <select class="form-control" v-model="address_id">
                                    <option :value="add.id" v-for="add in addresses" :key="add.id">{{ add.street }}, {{ add.city }}</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Choose Payment Method</label>

                                <div v-for="p in payment_methods" :key="p">
                                    {{ p.toUpperCase() }} <input type="radio" :value="p" v-model="payment_method"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Total: Rs. {{ getTotalCart }} </p>
                            <p>Discount: Rs.0</p>
                            <h3>Total: Rs. {{ getTotalCart }}</h3>
                            <button class="btn btn-success btn-block" @click="checkout()">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
var apis = {
    getApi: '/cart',
    addApi: '/add-cart',
    removeApi: '/remove-cart',
    changeApi: '/change-cart-quantity',
}
import { useToast } from "vue-toastification";
export default {
    name: 'Cart',
    props:['addresses'],
    data: function () {
        return {
            cart: {
                user_id: '',
                total_amount: '',
                items: [],
                restaurant_id:'',
            },
            toast: '',
            address_id:'',
            payment_methods:['cash','esewa'],
            payment_method:'',
            restaurant_id:'',

        }
    },
    methods: {
        getCart() {
            axios.get(apis.getApi).then((response) => {
                this.cart = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        addToCart: function (item) {
            axios.post(apis.addApi, {
                item_id: item.id,
                quantity: 1,
                price: item.price,
            }).then((response) => {
                console.log(response);
            });
        },
        removeFromCart: function (item, index) {
            axios.post(apis.removeApi, {
                item_id: item.id,
            }).then((response) => {
                this.cart.items.splice(index, 1);
                this.toast.error('Item Removed Successfully');
            });
        },
        changeQuantity: function (item, qty, index) {
            if (qty <= 0) {
                return;
            }
            axios.post(apis.changeApi, {
                item_id: item.id,
                quantity: qty,
            }).then((response) => {
                this.cart.items[index].pivot.quantity = qty;
                this.toast.success(`Item Quantity Updated to ${qty}`);
            });
        },
        checkout() {
            if(this.address_id == "" || this.payment_method == "") {
                this.toast.error('Address and Payment Payment Cannot be empty');
            }

            var canCheckout = false;
            var ids = [];
            this.cart.items.forEach(function(item){
                ids.push(item.restaurant_id);
            });

            if(ids.every((val, i, arr) => val === arr[0])) {
                canCheckout = true;
            }

            if(!canCheckout) {
                this.toast.error('You cannot order from multiple restaurants in a single order.');
                return;
            }
            axios.post('/order',{
                items:this.cart.items,
                address_id:this.address_id,
                payment_method:this.payment_method,
                payable_amount:this.getTotalCart,
                restaurant_id:this.cart.items[0].restaurant_id
            }).then((response) => {
                this.toast.success(`Order Created Successfully with Order Id ${response.data.id}`);

                if(this.payment_method == "esewa") {
                    this.redirectToEsewa(response.data.id);
                } else {
                    window.location.href="/order-success?order_id="+response.data.id;
                }
            }).catch((error) => {
                console.log(error);
            })
        },
        redirectToEsewa(orderId) {
            var path="https://uat.esewa.com.np/epay/main";
            var params= {
                amt: this.getTotalCart,
                psc: 0,
                pdc: 0,
                txAmt: 0,
                tAmt: this.getTotalCart,
                pid: orderId,
                scd: "EPAYTEST",
                su: "http://mealmentor.test/order-success?order_id="+orderId,
                fu: "http://mealmentor.test/order-failed?order_id="+orderId
            }
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", path);

            for(var key in params) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
        }
    },
    computed: {
        getTotalCart() {
            return this.cart.items.reduce((total, item) => {
                return total + item.pivot.price * item.pivot.quantity;
            }, 0);
        }
    },
    mounted() {
        var _this = this;
        _this.getCart();
        this.toast = useToast();
    }
}
</script>
