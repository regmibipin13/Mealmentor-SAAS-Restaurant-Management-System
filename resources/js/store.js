// Vuex
import { createStore } from 'vuex'

const store = createStore({
    state () {
      return {
        carts:[],
        favorites:[],
      }
    },
    mutations: {
        // Cart System
      addToCart(state, item, quantity = 1) {
        const duplicatedProductIndex = state.carts.findIndex(cart => cart.id === item.id);
        if (duplicatedProductIndex !== -1) {
            state.carts[duplicatedProductIndex].quantity = state.carts[duplicatedProductIndex].quantity + quantity;
            return;
        }
        item.quantity = quantity;
        state.carts.push(item);
      },

      removeFromCart(state, index) {
        state.carts.splice(index, 1);
      },

      increaseQuantity(state, index) {
        state.carts[index].quantity++;
      },
      decreaseQuantity(state, index) {
        state.carts[index].quantity--;
      },
      changeQuantity(state, index, quantity) {
        state.carts[index].quantity = quantity;
      },
      // Favorite System
      addToFav(state, item) {
        const duplicatedProductIndex = state.favorites.findIndex(cart => cart.id === item.id);
        if (duplicatedProductIndex !== -1) {
            state.favorites[duplicatedProductIndex].quantity++;
            return;
        }
        item.quantity = 1;
        state.favorites.push(item);
      },

      removeFromFav(state, index) {
        state.favorites.splice(index, 1);
      },
      increaseQuantityFav(state, index) {
        state.favorites[index].quantity++;
      },
      decreaseQuantityFav(state, index) {
        state.favorites[index].quantity--;
      },
      changeQuantity(state, index, quantity) {
        state.favorites[index].quantity = quantity;
      },
    },
    actions:{

    }
})
