<script lang="js" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import { ref, computed } from 'vue';

import { useShoppingStore } from '@/store/cart';
const shoppingStore = useShoppingStore()
const { cartItems, increaseQuantity, decreaseQuantity, removeItem ,saveToSessionStorage} = useShoppingStore()

const props = defineProps({
    user: Object,
    containsFilm:Array,
})

const success = (text) => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: text,
                showConfirmButton: false,
                timer: 1500
            })
        }



const totalPrice = computed(() => {
    return cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
});

const totalQuantity = computed(() => {
    return cartItems.reduce((total, item) => total + item.quantity
        , 0);
});

const DiscountPrice = computed(() => {
    let discount;
    if (totalPrice.value > 100) {
        discount = totalPrice.value * 0.10
    }
    else {
        discount = 0;
    }
    return discount.toFixed(2);
});

const TotalDiscount = computed(() => {
    return totalPrice.value - DiscountPrice.value;
});

const calculateItemPrice = computed(() => {
    return cartItems.map(item => {
        return item.price * item.quantity;
    });
});

const totalItems = computed(() => {
    return cartItems.length;
});



const checkout = async () => {
    const id = props.user.id;
    const payment_id = Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
    const promises = [];
    const recheck = [];

        for (let item of cartItems) {
            if (props.containsFilm.some(film => film.film_id === item.film_id)) {
                recheck.push(item.film_id);
            }
        }

    if (recheck.length > 0) {
        const promise = new Promise(async (reject) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Buy it!"
            }).then(async (result) => {
                if (!result.isConfirmed) {
                    reject('Cancelled');
                    return;
                } else {
                    for (let item of cartItems) {
                        const film_id = item.film_id;
                        const total = item.price * item.quantity;
                        const week = item.quantity;
                        const paymentData = {
                            payment_id: payment_id,
                            id: id,
                            film_id: film_id,
                            total: total,
                            week: week
                        };
                        try {
                            const response = await axios.post('/payment', paymentData);
                            success('Payment completed')
                        } catch (error) {
                            console.error(error);
                        }
                    }
                    // ลบรายการในตะกร้าและบันทึกลง sessionStorage
                    cartItems.splice(0, cartItems.length);
                    saveToSessionStorage();
                }
            });
        });
        promises.push(promise);

        await Promise.all(promises);
    }else{
        for (let item of cartItems) {
                        const film_id = item.film_id;
                        const total = item.price * item.quantity;
                        const week = item.quantity;
                        const paymentData = {
                            payment_id: payment_id,
                            id: id,
                            film_id: film_id,
                            total: total,
                            week: week
                        };
                        try {
                            const response = await axios.post('/payment', paymentData);
                            success('Payment completed')
                        } catch (error) {
                            console.error(error);
                        }
                    }
                    // ลบรายการในตะกร้าและบันทึกลง sessionStorage
                    cartItems.splice(0, cartItems.length);
                    saveToSessionStorage();
    }
};



</script>
<style scoped>
#summary {
    background-color: #f6f6f6;
}
</style>

<template>
    <AppLayout title="Cart">
        <body class="bg-white ">
            <div class="container max-w-7xl mx-auto ">
                <div class="  bg-white py-10 mx-auto columns-1 sm:columns-1
                     md:grid grid-cols-2
                     lg:grid grid-cols-2
                     xl:grid grid-cols-2
                      ">
                <div class=" p-4">

                            <div class="flex justify-between border-b pb-8 columns-2">
                                <div class="flex items-center">
                                    <h1 class="font-bold text-xl sm:text-xl md:text-2xl lg:text-2xl xl:text-2xl 2xl:text-2xl">
                                        Cart Movies
                                    </h1>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-auto h-8 ml-1 mt-1.5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z"
                                        />
                                    </svg>
                                </div>
                                <h2 class="mt-3 font-semibold text-base sm:text-base md:text-base lg:text-xl xl:text-xl 2xl:text-2xl">
                                    {{ totalItems }} Movies /
                                    {{ totalQuantity }} Week
                                </h2>
                            </div>
                        <div class="flex mt-10 mb-5 text-gray-600 text-xs lg:text-lg ">
                            <h3
                                class="font-semibold  uppercase w-2/5"
                            >
                                Movies Details
                            </h3>
                            <h3
                                class="font-semibold text-center  uppercase w-1/5"
                            >
                                Week
                            </h3>
                            <h3
                                class="font-semibold text-center  uppercase w-1/5 "
                            >
                                Price
                            </h3>

                            <h3
                                class="font-semibold text-center text-gray-600 uppercase w-1/5"
                            >
                                Total
                            </h3>
                        </div>
                        <div
                            v-for="(item, index) in cartItems"
                            :key="index"
                            class="flex items-center hover:bg-gray-100 -mx-4 px-6 py-5 ">
                            <div class="flex w-3/5 sm:w-2/5 lg:flex-auto">
                                <!-- product -->
                                <div class="m-2 ">
                                    <img class="max-w-8 h-auto sm:max-w-16 lg:max-w-28 xl:w-32 2xl:max-w-40 "

                                        :src="item.imgUrl"
                                        alt=""
                                    />
                                </div>
                                <div
                                    class="flex flex-col justify-between ml-4 flex-grow overflow-hidden"
                                >
                                    <p class="font-bold text-sm lg:text-xl">
                                        {{ item.title }}
                                    </p>
                                    <span
                                        class="text-gray-500 text-xs leading-4 lg:text-lg"
                                    >
                                        {{ item.category }}<br />
                                        {{ item.length }} min
                                    </span>
                                    <a
                                        class="font-semibold hover:text-red-500 text-gray-500 text-xs"
                                        @click="removeItem(index)">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="flex justify-items-center w-1/5">
                                <div class="grid grid-cols-1 justify-items-center
                                md:ml-4
                                lg:grid grid-cols-3 ">
                                    <button @click="decreaseQuantity(item)" >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5 12h14 "
                                        />
                                    </svg>
                                </button>
                                <div
                                    class=" border-2 rounded-lg text-center w-4 xl:w-6 "
                                >
                                    {{ item.quantity }}
                                </div>

                                <!-- :style="{ width: (quantity.length * 8) + 'px', maxWidth: '100%' }" -->
                                <button @click="increaseQuantity(item)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15"
                                        />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            <span
                                class="text-center w-1/5 font-semibold text-sm "
                                >{{ item.price }} ฿</span
                            >
                            <span
                                class="text-center w-1/5 font-semibold text-sm"
                                >{{ calculateItemPrice[index] }} ฿
                            </span>
                        </div>

                            <a
                                href="/home/1"
                                class="flex font-semibold text-purple-500 text-sm mt-10 hover:text-purple-600">
                                <svg
                                    class="fill-current mr-2 text-purple-500 w-4"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                                </svg>
                                Continue Shopping 🛒
                            </a>

            </div>

            <div
                            id="summary"
                            class="mx-auto max-w-xl  pt-2 py-6 px-10 font-sans text-lg sm:px-4 sm:text-lg md:px-4 md:text-xl lg:px-6 lg:text-xl xl:px-8 xl:text-xl 2xl:px-8 2xl:text-2xl 2xl:mx-16">
                            <h1
                                class="font-bold text-lg sm:text-base md:text-base lg:text-xl xl:text-xl 2xl:text-2xl mt-3"
                            >
                                Order Summary
                            </h1>
                            <div class="flex justify-between mt-4 mb-5">
                                <p
                                    class="font-semibold text-sm uppercase font-bold text-lg sm:text-sm pb-1 md:text-sm lg:text-xl xl:text-xl 2xl:text-2xl"
                                >
                                    {{ totalQuantity }} week
                                </p>
                                <p class="font-semibold text-lg sm:text-sm pb-1 md:text-sm lg:text-xl xl:text-xl 2xl:text-2xl">
                                    {{ totalPrice }} ฿
                                </p>
                            </div>

                            <div class="border-t mt-8">
                                <span
                                    class="font-light text-balance italic text-sm text-red-700 antialiased sm:text-xs lg:text-lg"
                                    >10% discount for minimum purchase of 100
                                    baht</span
                                >
                                <div
                                    class="flex font-semibold justify-between py-0 mt-5 text-sm sm:text-sm pb-1 md:text-sm lg:text-lg xl:text-lg 2xl:text-xl uppercase"
                                >
                                    <span
                                        >Discount<span v-if="totalPrice > 100"
                                            >✔️</span
                                        ></span
                                    >
                                    <span> {{ DiscountPrice }} </span>
                                </div>
                                <div
                                    class="flex font-semibold justify-between mb-2 mt-5 text-sm sm:text-sm pb-1 md:text-sm lg:text-lg xl:text-lg 2xl:text-xl uppercase"
                                >
                                    <span>Total cost</span>
                                    <span> {{ TotalDiscount }} ฿</span>
                                </div>

                                <a
                                    @click="checkout()"
                                    class="bg-purple-600 font-semibold hover:text-pink-400 py-3 text-sm text-white uppercase w-full rounded-lg p-4"
                                >
                                    Checkout
                                </a>
                            </div>
            </div>
            </div>
            </div>




        </body>
    </AppLayout>
</template>

<style scoped>
.hiddenn {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 375px; /* ตั้งค่าความกว้างสูงสุดตามที่คุณต้องการ */
}
</style>
