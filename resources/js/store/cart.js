import { find } from 'lodash'
import { defineStore } from 'pinia'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import { computed, ref ,onMounted ,defineProps } from 'vue'
import axios from 'axios';



export const useShoppingStore = defineStore('shopping', () => {
    //const cartItems = ref(JSON.parse(localStorage.getItem('cartItems')) || []);
    const cartItems = ref(JSON.parse(sessionStorage.getItem('cartItems')) || []);



    // const user_id = ref($page.props.auth.user.id)

    const increaseQuantity = (item) => {
        item.quantity++;
        saveToSessionStorage()
    };

    const decreaseQuantity = (item) => {
        if (item.quantity > 1) {
            item.quantity--;
        }
        saveToSessionStorage()
    };

    const removeItem = (index) => {
        cartItems.value.splice(index, 1);
        saveToSessionStorage()
    };

    const saveToLocalStorage = () => { //Function Set localStorage
        localStorage.setItem('cartItems', JSON.stringify(cartItems.value));
    }

    const saveToSessionStorage = () => { //Function Set sessionStorage
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems.value));
    }

    const addToCart = (quantity, title, category, price, imgUrl, length ,film_id) => {
        //หา index ของ titlle ใน cartItems ถ้าไม่เจอ = -1
        const finditem = cartItems.value.findIndex(film => film.title === title);
        const success = (text) => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: text,
                showConfirmButton: false,
                timer: 1500
            })
        }



        if (finditem === -1) {
            cartItems.value.push({
                // user_id : user_id.value,
                quantity: quantity,
                film_id:film_id,
                title: title,
                category: category,
                price: price,
                imgUrl: imgUrl,
                length: length
            });
            success("Added Movie Sucessfull")
        }
        else {
            cartItems.value[finditem].quantity += 1;
            success("Added Week Sucessfull")
        }
        saveToSessionStorage()


    }



    return { addToCart, increaseQuantity, decreaseQuantity, removeItem, cartItems ,saveToSessionStorage};
})


export const GetCustomerInfo = defineStore('profile', () => {
    const infoCustomer = ref(JSON.parse(sessionStorage.getItem('infoCustomer')) || []);
    return{infoCustomer};
})
