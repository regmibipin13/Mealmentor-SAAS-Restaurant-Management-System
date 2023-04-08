<template>
    <div class="container-fluid" :style="{
        'pointer-events': isLoading ? 'none' : ''
    }">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Items List
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="category">Category</label>
                                <select v-model="search.item_category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    <option :value="cat.id" v-for="cat in categories">{{ cat.name }}</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label for="name">Item Name</label>
                                <input type="text" class="form-control col-md-8" v-model="search.name"
                                    placeholder="Search Items">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="overflow-y: auto; height: 300px;" v-if="items.length > 0">
                            <div class="col-md-6 mb-4" v-for="item in items">
                                <div class="card" @click="addToCart(item)">
                                    <img class="card-img-top" :src="item.photo" :alt="item.name" height="200">
                                    <div class="card-body ">
                                        <div>
                                            <span class="mm-color-text mm-text-13 mm-text-bold">{{
                                                item.name
                                            }}</span>
                                            <br>
                                            <span class="mm-color-text">Rs. {{ item.price }} /
                                                {{ item.unit_value_of_price }}
                                                {{ item.unit.name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-else>
                            <span class="text-center">No Items</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cart
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th></th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product, key in cart.items" :key="key" v-if="cart.items.length > 0">
                                    <td>{{ product.name }} * {{ product.quantity }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" @click="addToCart(product)">+</button>
                                        &nbsp;
                                        <button class="btn btn-sm btn-danger" @click="decreaseQuantity(product)">-</button>
                                    </td>
                                    <td>Rs. {{ product.price * product.quantity }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" @click="removeFromCart(key)">Remove</button>
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td colspan="4">No Items In Cart</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <table class="table table-bordered">
                            <tr>
                                <th>Total Price</th>
                                <td>Rs.{{ cartTotal }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <select class="form-control mb-3" v-model="cart.table_id">
                            <option value="">Select Table</option>
                            <option :value="t.id" v-for="t in tables">{{ t.name }}</option>
                        </select>
                        <button class="btn btn-block btn-success" @click="submitOrder">
                            <span v-if="!isLoading">Confirm Order</span>

                            <div class="spinner-border" role="status" v-if="isLoading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Running Orders
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Order Id</th>
                                <th>Table</th>
                                <th>Total Amount</th>
                                <th>Delivery Status</th>
                                <th>Order Status</th>
                                <th></th>
                            </tr>
                            <tr v-for="order, key in pendingOrders">
                                <td>
                                    {{ order.id }}
                                </td>
                                <td>{{ order.table.name }}</td>
                                <td>{{ orderTotal(key) }}</td>
                                <td>{{ order.order_status }}</td>
                                <td>{{ order.is_order_ended ? 'Completed' : 'Running' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" style="background: #0a58ca;"
                                        :href="'/restaurants/pos-orders/' + order.id">View</a>
                                    &nbsp;&nbsp;
                                    <button class="btn-btn-sm btn-success" style="background: #198754;"
                                        @click="markComplete(key)">Mark Complete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { useToast } from "vue-toastification";
export default {
    name: 'pos',
    props: ['categories', 'tables', 'restaurant'],
    data: function () {
        return {
            search: {
                name: '',
                item_category_id: ''
            },
            items: [],
            cart: {
                items: [],
                total: '',
                table_id: '',
            },
            toast: '',
            pendingOrders: [],
            isLoading: false,
        };
    },
    watch: {
        search: {
            deep: true,
            handler() {
                this.getItems();
            }
        }
    },
    methods: {
        getItems() {
            var _this = this;
            axios.get('/' + this.restaurant.slug + '/pos', {
                params: this.search
            })
                .then((response) => {
                    _this.items = response.data.items;
                    _this.pendingOrders = response.data.pending_orders;
                }).catch((error) => {
                    _this.items = [];
                    _this.pendingOrders = [];
                    console.log(error);
                });
        },
        addToCart(item) {
            if (this.checkIfCartHas(item.id)) {
                var index = this.getMatchItemIndex(item.id);
                this.cart.items[index].quantity++;
            } else {
                item.quantity = 1;
                this.cart.items.push(item);
            }
        },
        decreaseQuantity(item) {
            var index = this.getMatchItemIndex(item.id);
            if (index >= 0 && this.cart.items[index].quantity > 1) {
                this.cart.items[index].quantity--;
            }
        },
        removeFromCart(index) {
            if (index >= 0) {
                this.cart.items.splice(index, 1);
            }
        },
        checkIfCartHas(itemId) {
            var found = false;
            for (var i = 0; i < this.cart.items.length; i++) {
                if (this.cart.items[i].id == itemId) {
                    found = true;
                    break;
                }
            }
            return found;
        },
        getMatchItemIndex(itemId) {
            var index;
            for (var i = 0; i < this.cart.items.length; i++) {
                if (this.cart.items[i].id == itemId) {
                    index = i;
                    break;
                }
            }
            return index;
        },
        submitOrder() {
            this.isLoading = true;
            if (this.cart.items.length < 0 || this.cart.table_id == '') {
                this.toast.error('Please fill up all the details');
                this.isLoading = false;
                return;
            }
            this.cart.total = this.cartTotal;
            axios.post('pos', this.cart)
                .then((response) => {
                    this.toast.success('Order Created Successfully');
                    this.cart = {
                        items: [],
                        table_id: '',
                        total: '',
                    }
                    this.getItems();
                    this.isLoading = false;
                }).catch((error) => {
                    this.toast.error('Something went wrong');
                    this.isLoading = false;
                })
        },
        markComplete(index) {
            if (index >= 0) {
                axios.patch('/restaurants/pos-orders/' + this.pendingOrders[index].id, {
                    order_status: 'Completed',
                }).then((response) => {
                    this.toast.success('Order Marked Completed Successfully');
                    this.getItems();
                }).catch((error) => {
                    this.toast.error('Something went wrong');
                    console.log(error);
                })
            }
        },

        orderTotal(index) {
            return this.pendingOrders[index].orderable_items.reduce((total, item) => {
                return total + item.price * item.quantity
            }, 0)

        }
    },
    computed: {
        cartTotal() {
            return this.cart.items.reduce((total, item) => {
                return total + item.price * item.quantity;
            }, 0);
        }
    },
    mounted() {
        this.toast = useToast();
        this.getItems();
    }
}
</script>
