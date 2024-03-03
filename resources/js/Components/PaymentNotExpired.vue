<script setup>
defineProps({
    payments : Object
})

const formatDate = (dateTimeString) => {
  const dateTime = new Date(dateTimeString);
  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  const formattedDate = `${dateTime.getDate().toString().padStart(2, '0')} ${months[dateTime.getMonth()]} ${dateTime.getFullYear()}`;
  return formattedDate;
};




</script>

<template>
    <div v-for="payment in payments"
    class="bg-white mx-auto max-w-xl m-4 rounded-3xl ring-1 ring-gray-200
    lg:mx-auto lg:flex lg:max-w-5xl lg:mt-2
     ">
        <div class="columns-2 p-8 sm:p-10 lg:flex-auto" >
          <img :src="payment.imgUrl" class="rounded-lg" alt="" width="150 px">
            <div >
              <h3 class="text-2xl font-bold tracking-tight text-blue-950 sm:text-lg">{{ payment.title }}</h3>
              <p class="mt-6 text-base font-semibold leading-6 text-gray-500 lg:text-base">{{ payment.name }}</p>
              <p class="mt-4 text-base leading-6 text-gray-600 sm:text-sm">Order ID : {{ payment.payment_id }} </p>
              <p class="mt-4 text-base leading-3 text-gray-600 sm:text-sm">Start Date : {{ formatDate(payment.created_at) }}</p>
            </div>
        </div>
        <div class="m-auto :lg:mx-auto lg:w-full lg:max-w-md lg:flex-shrink-0 ">
                <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16 lg:mx-6 lg:h-5/6">
                  <div class="mx-auto max-w-xs px-8  ">
                    <p class="text-2xl font-semibold text-gray-500">{{ payment.total }} ฿</p>
                    <p class="mt-6 flex items-baseline justify-center gap-x-2">
                      <span class="text-5xl font-bold tracking-tight text-gray-900">{{ payment.time }} </span>
                      <span class="text-lg font-semibold leading-6 tracking-wide text-gray-600">Days </span>
                    </p>
                  </div>
                </div>

        </div>
    </div>
  </template>
