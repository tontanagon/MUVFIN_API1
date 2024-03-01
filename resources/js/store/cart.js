import { find } from 'lodash'
import { defineStore } from 'pinia'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import { computed, ref } from 'vue'




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

    const addToCart = (quantity, title, category, price, imgUrl, length) => {
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

        console.log(finditem);

        if (finditem === -1) {
            cartItems.value.push({
                // user_id : user_id.value,
                quantity: quantity,
                title: title,
                category: category,
                price: price,
                imgUrl: imgUrl,
                length: length
            });
            success("เพิ่มหนังลงตะกร้าเรียบร้อยเเล้ว")
        }
        else {
            cartItems.value[finditem].quantity += 1;
            success("เพิ่มระยะเวลาเรียบร้อยเเล้ว")
        }
        saveToSessionStorage()
        console.log(cartItems.value);

    }



    return { addToCart, increaseQuantity, decreaseQuantity, removeItem, cartItems };
})


export const GetCustomerInfo = defineStore('profile', () => {
    const infoCustomer = ref(JSON.parse(sessionStorage.getItem('infoCustomer')) || []);

    return{infoCustomer};
})
