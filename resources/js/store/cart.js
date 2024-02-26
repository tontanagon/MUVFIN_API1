import { find } from 'lodash'
import { defineStore } from 'pinia'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import { computed, ref } from 'vue'

export const useShoppingStore = defineStore('shopping', () => {
    const cartItems1 = ref([
        { title: 'Hello', quantity: 1, price: 29, length: '102', cat: 'Action', imgUrl: 'https://i.kym-cdn.com/entries/icons/original/000/046/895/huh_cat.jpg' },
        { title: 'Hello World', quantity: 1, price: 29, length: '999', cat: 'Simulator', imgUrl: 'https://i.pinimg.com/736x/b9/c4/7e/b9c47ef70bff06613d397abfce02c6e7.jpg' },
        { title: 'Hello EiEi', quantity: 1, price: 29, length: '3203', cat: 'Learning', imgUrl: 'https://www.shutterstock.com/image-photo/portrait-beige-cat-shocked-expression-600nw-2319422905.jpg' }
    ]);

    const  cartItems = ref([]);

    const increaseQuantity = (item) => {
        item.quantity++;
    };

    const decreaseQuantity = (item) => {
        if (item.quantity > 1) {
            item.quantity--;
        }
    };

    const removeItem = (index) => {
        cartItems.value.splice(index, 1);
    };

    const totalPrice = computed(() => {
        return cartItems.value.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    });

    const totalQuantity = computed(() => {
        return cartItems.value.reduce((total, item) => {
            return total + item.quantity;
        }, 0);
    });


    const addToCart = (quantity, title, category, price, imgUrl, length) => {
        //หา index ของ titlle ใน cartItems ถ้าไม่เจอ = -1
        const finditem = cartItems.value.findIndex(film => film.title === title);

        const success = (hum) => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: hum,
                showConfirmButton: false,
                timer: 1500
            })
        }

        console.log(finditem);
        if(finditem === -1){
            cartItems.value.push({
                quantity: quantity,
                title: title,
                category: category,
                price: price,
                imgUrl: imgUrl,
                length: length
            });
            success("เพิ่มหนังลงตะกร้าเรียบร้อยเเล้ว")
        }else{
            cartItems.value[finditem].quantity += 1;
            success("เพิ่มระยะเวลาเรียบร้อยเเล้ว")
        }


        console.log(cartItems.value);
    }

    return {addToCart, increaseQuantity, decreaseQuantity, removeItem, cartItems, cartItems1, totalPrice , totalQuantity};
})



