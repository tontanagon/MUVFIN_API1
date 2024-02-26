<script lang="js" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { ref } from 'vue';

import { useShoppingStore } from '@/store/cart';
const shoppingStore = useShoppingStore()
const { cartItems,  increaseQuantity, decreaseQuantity, removeItem , totalPrice , totalQuantity} = useShoppingStore()

// cartItems.value.forEach(item => {
//     item.quantity = ref(item.quantity);
// });

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
            <div class="container mx-auto mt-10">
                <div class="flex shadow-md my-10">
                    <div class="w-3/4 bg-white px-10 py-10">
                        <div class="flex justify-between border-b pb-8">
                            <div class="flex items-center">
                                <h1 class="font-semibold text-2xl">Cart Movies</h1>
                                <img src="https://w7.pngwing.com/pngs/1013/726/png-transparent-ticket-computer-icons-others-miscellaneous-angle-label.png"
                                    alt="Movie Cart" class="mr-4" style="width: 40px; height: 40px;">
                            </div>
                            <h2 class="font-semibold text-2xl"> {{ totalQuantity }} Item</h2>
                        </div>
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
                                Movies Details
                            </h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                                Quantity
                            </h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                                Price
                            </h3>

                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                                Total
                            </h3>
                        </div>
                        <div v-for="item in cartItems" :key="item.title"
                            class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5">
                                <!-- product -->
                                <div class="w-20">
                                    <img class="h-24" :src="item.imgUrl" alt="" />
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">
                                        {{ item.title }}
                                    </span>
                                    <span class="text-gray-500 text-xs leading-4">
                                        {{ item.length }} minute <br>
                                        {{ item.cat }}
                                    </span>
                                    <a class="font-semibold hover:text-red-500 text-gray-500 text-xs"
                                        @click="removeItem">Remove</a>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <button @click="increaseQuantity(item)">+</button>

                                <input class="mx-2 border text-center w-12" type="text" v-model="item.quantity" readonly/>
                                <!-- :style="{ width: (quantity.length * 8) + 'px', maxWidth: '100%' }" -->
                                <button @click="decreaseQuantity(item)">-</button>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">{{ item.price }} บาท</span>
                            <span class="text-center w-1/5 font-semibold text-sm">{{ totalPrice }} บาท
                            </span>
                        </div>

                        <a href="/home/1" class="flex font-semibold text-indigo-600 text-sm mt-10 hover:text-indigo-800">
                            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                                <path
                                    d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                            </svg>
                            Continue Shopping :D
                        </a>
                    </div>

                    <div id="summary" class="w-1/4 px-8 py-10">
                        <h1 class="font-semibold text-2xl border-b pb-8">
                            Order Summary
                        </h1>
                        <div class="flex justify-between mt-10 mb-5">
                            <span class="font-semibold text-sm uppercase"> {{ totalQuantity }} Item </span>
                            <span class="font-semibold text-sm">{{totalPrice}} บาท</span>
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
                            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                                <span>Total cost</span>
                                <span> {{ totalPrice }} บาท</span>
                            </div>
                            <button
                                class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </AppLayout>
</template>
