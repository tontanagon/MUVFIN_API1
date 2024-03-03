<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { ref } from 'vue'
import PaymentExpiredVue from '../Components/PaymentExpired.vue';
import PaymentNotExpiredVue from '../Components/PaymentNotExpired.vue';


defineProps(['PaymentNotEx','PaymentEx']);

const togglePayment = ref(true)

</script>

<template>


    <AppLayout title="Cart">
        <template #header>
            <div class="grid grid-cols-2 gap-4">
              <h1 class="font-semibold text-2xl text-gray-800 leading-tight sm:text-xl md:text-xl lg:text-3xl">
                Order History
            </h1>
            <div class="col-end-7 col-span-2 inline-flex rounded-md shadow-sm " role="group">
              <button v-if="togglePayment" @click="togglePayment = !togglePayment"
              type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-gray-200 rounded-lg hover:bg-purple-500 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0 1 18 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0 1 18 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 0 1 6 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
                </svg>

                Not Expired
              </button>

              <button v-if="!togglePayment" @click="togglePayment =!togglePayment"
              type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-gray-200 rounded-lg hover:bg-purple-500 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>

                Expired
              </button>
            </div>
            </div>
        </template>





<PaymentNotExpiredVue v-if="togglePayment" :payments="PaymentNotEx"/>
<PaymentExpiredVue v-if="!togglePayment" :payments="PaymentEx"/>

        <!-- <div class=" " v-for="payment in payment"> -->
          <!-- <div class="mx-auto max-w-7xl "> -->
            <!-- <div class="bg-white mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200  lg:mx-0 lg:flex lg:max-w-none"
            v-for="payment in payment">
              <div class="columns-2 p-8 sm:p-10 lg:flex-auto" >
                <img :src="payment.imgUrl" alt="" width="150 px">
                <div >
                  <h3 class="text-2xl font-bold tracking-tight text-gray-900">{{ payment.title }}</h3>
                <p class="mt-6 text-base leading-7 text-gray-600">{{ payment.name }}</p>
                </div>
              </div>
              <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                  <div class="mx-auto max-w-xs px-8">
                    <p class="text-base font-semibold text-gray-600">{{ payment.total }}</p>
                    <p class="mt-6 flex items-baseline justify-center gap-x-2">
                      <span class="text-5xl font-bold tracking-tight text-gray-900">{{ payment.time  }} </span>
                      <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">Days </span>
                    </p>
                    <a href="#" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get access</a>
                    <p class="mt-6 text-xs leading-5 text-gray-600">Invoices and receipts available for easy company reimbursement</p>
                  </div>
                </div>
              </div>
            </div> -->
          <!-- </div> -->
        <!-- </div> -->





  <!-- <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b ">Img</th>
          <th class="py-2 px-4 border-b ">Title</th>
          <th class="py-2 px-4 border-b ">Cate name</th>
          <th class="py-2 px-4 border-b ">Time</th>
          <th class="py-2 px-4 border-b ">Price</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="payment in payment">
            <img :src="payment.imgUrl" alt="" width="150 px">
            <td class="border border-slate-300 px-24 py2 ">{{ payment.title }}</td>
            <td class="border border-slate-300 px-24 py2 ">{{ payment.name }}</td>
            <td class="border border-slate-300 px-24 py2  ">{{ payment.time  }}</td>
            <td class="border border-slate-300 px-24 py2 ">{{ payment.total }}</td>
        </tr>
        <tr>
          <th class="border border-slate-300 px-24 py2 ">Summary</th>
          <th class="  px-24 py2 "></th>
          <th class="  px-24 py2 "></th>
          <th class="  px-24 py2 "></th>
          <th class="border border-slate-300 px-24 py2 "></th>

        </tr>
      </tbody>
    </table>
  </div> -->

    </AppLayout>
</template>
ี
