<template>
    <button class="mm-button bg-theme-button d-flex align-items-center" @click="addToCart(item)">
        <span style="text-transform: uppercase;" class="mm-text-15">Add to Cart</span>
        &nbsp;
        &nbsp;
        &nbsp;
        <i class="fa-solid fa-cart-plus" style="font-size: 16px;"></i>
    </button>
</template>


<script>
var apis = {
    getApi: '/cart',
    addApi: '/add-cart',
    removeApi: '/remove-cart',
    changeApi: '/change-cart-quantity',
}
import { useToast } from "vue-toastification";
export default {
    props: ['item'],
    data: function () {
        return {
            toast: '',
        };
    },
    methods: {
        addToCart: function (item) {
            axios.post(apis.addApi, {
                item_id: item.id,
                price: item.price,
                quantity: 1,
            }).then((response) => {
                console.log(response);
                if (response.data.hasOwnProperty('status')) {
                    if (response.data.status == 'success') {
                        this.toast.success(response.data.message);
                        this.$parent.countCart()
                    } else {
                        this.toast.error(response.data.message);
                    }
                } else {
                    this.toast.error('Something went wrong');
                }

            }).catch((error) => {
                this.toast.error('Something went wrong');
            });
        },
    },
    mounted() {
        this.toast = useToast();
    }
}

</script>
