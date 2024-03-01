<script lang="js" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import axios from 'axios';
import { ref, computed } from 'vue';

import { useShoppingStore } from '@/store/cart';
const shoppingStore = useShoppingStore()
const { cartItems, increaseQuantity, decreaseQuantity, removeItem } = useShoppingStore()

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


const checkout = () => {
    cartItems.post(route('payment'))
};


</script>
<style scoped>
#summary {
    background-color: #f6f6f6;
}
</style>

<template>
    <AppLayout title="Cart">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                cart
            </h2>
        </template> -->

        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                </div>
            </div>
        </div> -->

        <body class="bg-gray-100">
            <div class="container mx-auto">
                <div class="flex shadow-md ">
                    <div class="w-3/4 bg-white px-10 py-10  sm:px-4 md:px-4 lg:px-6 xl:px-8 2xl:px-8">
                        <div class="flex justify-between border-b pb-8 columns-2">
                            <div class="flex items-center ">
                                <h1 class="font-bold text-xl  sm:text-xl md:text-2xl lg:text-2xl xl:text-2xl 2xl:text-2xl ">
                                    Cart Movies
                                </h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-auto h-8 ml-1 mt-1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                </svg>
                            </div>
                            <h2
                                class=" mt-3 font-semibold text-base sm:text-base md:text-base lg:text-xl xl:text-xl 2xl:text-2xl">
                                {{ totalItems }} Movies /
                                {{ totalQuantity }} Week
                            </h2>

                        </div>
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
                                Movies Details
                            </h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">
                                Week
                            </h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">
                                Price
                            </h3>

                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">
                                Total
                            </h3>
                        </div>
                        <div v-for="(item, index) in cartItems" :key="index"
                            class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-3/5 sm:w-2/5">
                                <!-- product -->
                                <div class="w-20">
                                    <img class="h-24" :src="item.imgUrl" alt="" />
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow overflow-hidden">
                                    <p class="font-bold text-sm "  >
                                        {{ item.title }}
                                    </p>
                                    <span class="text-gray-500 text-xs leading-4 ">
                                        {{ item.category }}<br />
                                        {{ item.length }} min

                                    </span>
                                    <a class="font-semibold hover:text-red-500 text-gray-500 text-xs "
                                        @click="removeItem(index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5  " >
                                <button @click="decreaseQuantity(item)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14 " />
                                    </svg>

                                </button>

                                <!-- <input class="mx-2 border-full text-center w-12" type="text" v-model="item.quantity"
                                    readonly /> -->
                                    <div class="mx-2 border-2 rounded-lg text-center w-12 px-2" >
                                    {{ item.quantity }}
                                    </div>

                                <!-- :style="{ width: (quantity.length * 8) + 'px', maxWidth: '100%' }" -->
                                <button @click="increaseQuantity(item)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>

                                </button>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">{{ item.price }} บาท</span>
                            <span class="text-center w-1/5 font-semibold text-sm">{{ calculateItemPrice[index] }} บาท
                            </span>
                        </div>

                        <a href="/home/1" class="flex font-semibold text-purple-500 text-sm mt-10 hover:text-purple-600">
                            <svg class="fill-current mr-2 text-purple-500 w-4" viewBox="0 0 448 512">
                                <path
                                    d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                            </svg>
                            Continue Shopping 🛒
                        </a>
                    </div>

                    <div id="summary"
                        class="w-1/4 py-10 font-sans text-lg sm:px-4 sm:text-lg md:px-4 md:text-xl lg:px-6 lg:text-xl xl:px-8 xl:text-xl 2xl:px-8 2xl:text-2xl">
                        <h1 class="font-bold  text-lg
                        sm:text-base pb-1
                        md:text-base
                        lg:text-xl
                        xl:text-xl
                        2xl:text-2xl
                        border-b pb-8 mt-3">
                            Order Summary
                        </h1>
                        <div class="flex justify-between mt-10 mb-5">
                            <p class="font-semibold text-sm uppercase
                            font-bold  text-lg
                        sm:text-sm pb-1
                        md:text-sm
                        lg:text-xl
                        xl:text-xl
                        2xl:text-2xl">
                                {{ totalQuantity }} week
                            </p>
                            <p class="font-semibold text-sm">{{ totalPrice }} บาท</p>
                        </div>
                        <!-- <div>
                            <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                            <select class="block p-2 text-gray-600 w-full text-sm">
                                <option>Standard shipping - $10.00</option>
                            </select>
                        </div> -->
                        <!-- <div class="py-10">
                            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                            <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full" />
                        </div> -->
                        <!-- <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
                            Apply
                        </button> -->
                        <div class="border-t mt-8">
                            <span class="font-light italic text-sm text-red-700 antialiased">10% discount for minimum purchase of 100 baht</span>
                            <div class="flex font-semibold justify-between py-0 mt-5 text-sm uppercase">
                                <span>Discount<span v-if="totalPrice > 100 ">✔️</span></span>
                                <span> {{ DiscountPrice }} </span>
                            </div>
                            <div class="flex font-semibold justify-between py-2 text-sm uppercase">
                                <span>Total cost</span>
                                <span> {{ TotalDiscount }} บาท</span>
                            </div>
                            <a @click="checkout()"
                                class="bg-purple-600 font-semibold  hover:text-pink-400 py-3 text-sm text-white uppercase w-full rounded-lg p-4">
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
    .hidden {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 375px; /* ตั้งค่าความกว้างสูงสุดตามที่คุณต้องการ */
    }
</style>
