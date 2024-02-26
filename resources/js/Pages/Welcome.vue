<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>
<!-- logo -->
<template>
    <Head title="Welcome"/>
    <div class="relative sm:justify-center sm:items-center min-h-screen  bg-center bg-white ">
    <div class="flex justify-center items-center p-2">
        <img class="w-30 h-24   "  alt="">
    </div>


    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200  ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

      <img src="https://img5.pic.in.th/file/secure-sv1/-114ee969349f2a434.png" class="h-14" alt="muvfin Logo">


  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse sm:mr-6 sm:mt-3">
    <div v-if="canLogin" class=" text-right sm:mb-5">
            <Link v-if="$page.props.auth.user" :href="route('home')" class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</Link>
            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-6 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white   ">
    </ul>
  </div>
  </div>
</nav>

<div class="relative max-w-8xl sm:mx-5 pt-1 sm:pt-1 lg:pt-6">
    <h1 class="text-slate-900 font-extrabold text-8xl sm:text-5xl lg:text-8xl tracking-tight text-center ">Enjoy your movie </h1>
    <h1 class="text-slate-900 font-extrabold text-8xl sm:text-5xl lg:text-8xl tracking-tight text-center "> with muvfin</h1>
</div>



<div class="columns-2 gap-1 p-8 lg:mt-2  border-b border-slate-900/10">
  <div class="grid  lg:mt-14 sm:mt-4 ml-11">
    <h1 class="text-slate-900 font-extrabold text-4xl sm:text-base lg:text-6xl tracking-tight text-center ">What are muvfin??</h1>
    <h1 class="text-slate-900 font-extrabold text-4xl sm:text-base lg:text-6xl tracking-tight text-center ">=</h1>
    <h1 class="text-slate-900 font-extrabold text-2xl sm:text-base lg:text-5xl tracking-tight text-center ">Movie + Muffin</h1>
    <h1 class="text-slate-900 font-extrabold text-2xl sm:text-base lg:text-4xl tracking-tight text-center ">Movie rental website a week</h1>
    <h1 class="text-slate-900 font-extrabold text-2xl sm:text-base lg:text-4xl tracking-tight text-center ">with low price</h1>
    </div>
  <div class="sm:mt-4">
    <img src="https://img5.pic.in.th/file/secure-sv1/-38317a7a2296d61e7.png" alt="">
  </div>
</div>

<div class=" justify-items-start lg:mx-5 mb-4 mt-10 sm:mt-6">
    <h1 class="text-slate-900 font-extrabold text-15xl sm:text-2xl lg:text-4xl sm:mt-2 tracking-tight text-center mx-10">" POPULAR MOVIE "</h1>
</div>
<!-- card -->
<div class="gap-8 columns-1 sm:container sm:mx-3 md:columns-2 md:container md:mx-auto lg:columns-3 lg:container lg:mx-15 ">
  <div >
        <div class=" ml-5 sm:mb-5 sm:mx-auto max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg" src="https://img2.pic.in.th/pic/8593bce0954f969fbceecbbd3d7f5d34.jpeg" alt="" />
            </a>
            <div class="p-8 sm:p-4">
                <a href="#">
                    <h5 class="mb-2 text-2xl sm:text-xl font-bold tracking-tight text-gray-900 ">namen movie</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white text-white bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 ">
                    Add to cart
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
  </div>
  <div>
    <div class=" ml-4 sm:mb-5 max-w-sm sm:mx-auto bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg" src="https://img2.pic.in.th/pic/8593bce0954f969fbceecbbd3d7f5d34.jpeg" alt="" />
            </a>
            <div class="p-8 sm:p-4">
                <a href="#">
                    <h5 class="mb-2 text-2xl sm:text-xl font-bold tracking-tight text-gray-900 ">namen movie</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white text-white bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 ">
                    Add to cart
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
  </div>
  <div>
    <div class=" ml-4 sm:mb-5 max-w-sm sm:mx-auto bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg" src="https://img2.pic.in.th/pic/8593bce0954f969fbceecbbd3d7f5d34.jpeg" alt="" />
            </a>
            <div class="p-8 sm:p-4">
                <a href="#">
                    <h5 class="mb-2 text-2xl sm:text-xl font-bold tracking-tight text-gray-900 ">namen movie</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white text-white bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 ">
                    Add to cart
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</div>

    <!-- standart plan -->
    <footer class="bg-white rounded-lg shadow m-4  sm:text-center">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center sm:items-center md:justify-between sm:justify-between sm:text-center">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500  sm:mt-0  sm:text-center sm:justify-center">
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">About</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer>





<!-- sponsor -->

</div>

</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
