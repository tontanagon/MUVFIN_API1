 <script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue'
import { GetCustomerInfo } from '@/store/cart';
const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    films: Object,
    customer : Object,
});



</script>
<!-- logo -->
<template>
    <Head title="Welcome"/>

    <header>
        <nav class="gradient w-full z-20 top-0 start-0 border-b border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

                <img src="https://img5.pic.in.th/file/secure-sv1/-114ee969349f2a434.png" class="h-14" alt="muvfin Logo">


                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse sm:mr-6 sm:mt-3">
                    <div v-if="canLogin" class=" text-right
                        text-base
                        sm:text-sm sm:mb-5
                        md:text-lg
                        lg:text-lg
                        xl:text-2xl
                        2xl:text-2xl
                        ">
                            <Link v-if="$page.props.auth.user" :href="route('home')" class="font-semibold text-white hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</Link>
                            <template v-else>
                                <Link :href="route('login')" class="font-sans text-white hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>
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
    </header>

    <div class="w-full  bg-center gradient ">
            <h1 class="text-white font-sans w-auto font-extrabold text-xl pt-6
            sm:text-4xl sm:pt-8
            md:text-5xl
            lg:text-7xl xl:pt-8
            xl:text-7xl xl:pt-8
            2xl:text-8xl
            tracking-tight text-center ">Welcome you to a world <br> where movie enjoyment</h1>

            <div class="columns-2 gap-8  w-auto h-auto mt-6 ">
                <div class="
                        ml-2
                        sm:mt-6
                        md:mt-8
                        lg:mt-14 lg:mb-32
                        xl:mt-14
                        2xl:mt-24">
                    <h1 class="text-slate-900 w-auto font-sans font-medium
                    text-xs ml-8
                    sm:text-xl sm:ml-12
                    md:text-3xl md:ml-6
                    lg:text-4xl
                    xl:text-5xl
                    2xl:text-5xl 2xl:ml-32 2xl:pl-8
                    tracking-tight text-center ">Join <a class="underline decoration-wavy decoration-amber-300 ">Muvfin</a> for an unparalleled cinematic experience your gateway to entertainment.
                    <div class=" flex justify-center mx-auto mb-4 mt-4">
                        <a

                        :href="route('home')"
                         class="inline-flex items-center
                        px-2 py-1 text-xs
                        sm:py-2 sm:py-1 sm:text-base
                        md:text-lg md:px-3 md:py-2
                        lg:px-6
                        text-sm font-medium text-center text bg-white rounded-lg hover:bg-stone-50 hover:text-sky-950 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        get start
                            <svg class="rtl:rotate-180 w-3 h-3 ms-2
                                sm:w-3.5 sm:h-3.5 sm:ms-2
                                md:w-3.5 md:h-3.5 md:ms-2
                                " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                    </h1>

                </div>
                <div class="justify-center sm:mt-4 break-before-column">
                    <img src="https://img5.pic.in.th/file/secure-sv1/-38317a7a2296d61e7.png" alt="">
                </div>
            </div>


                <div class="relative
                    -pb-4 mt-12
                    lg:-mt-20

                       ">
                    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                                <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"
                                ></path>
                                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                            </g>
                            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="evenodd">
                                <path
                                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                                ></path>
                            </g>
                        </g>
                    </svg>
                </div>
    </div>



    <div class="
    max-w-full
    max-w-screen-sm
    max-w-screen-md
    max-w-screen-lg
    max-w-screen-xl
    max-w-screen-2xl
    ">
        <h1 class="justify-items-center  font-sans tracking-tight text-center
        text-lg mt-2
        sm:text-2xl sm:mb-6 sm:mt-2
        md:text-4xl md:mb-6 md:mt-3
        lg:text-4xl lg:mb-6 lg:mt-3
        xl:text-5xl xl:mb-6 xl:mt-8
        2xl:text-5xl  2xl:mb-6 2xl:mt-6">" POPULAR MOVIE "</h1>

    <!-- card -->

    <div class="
        columns-1 container
        sm:columns-1 sm:container
        md:columns-1 md:container
        lg:grid grid-cols-3 lg:container
        xl:grid grid-cols-3 xl:container xl:gap-4
        2xl:grid grid-cols-3 2xl:mx-auto 2xl:gap-2 2xl:max-w-6xl ">
        <!-- sm:pt-4 sm:pl-4  -->
        <div class="card hover:bg-stone-100  rounded-lg shadow-lg
            w-full h-72 columns-2 px-2 pt-2 mt-4
            sm:w-full sm:h-80  sm:columns-2  sm:mt-4
            md:w-10/12 md:mb-2 md:columns-2 md:mx-auto
            lg:w-72 lg:h-auto lg:columns-1 lg:px-4
            xl:w-80 xl:h-auto xl:columns-1 xl:px-4
            2xl:w-80 2xl:h-auto 2xl:columns-1 2xl:px-4
            "
            v-for="film in films ">
                    <img class="
                        rounded-lg object-fill h-44 w-32
                        sm:object-fill sm:h-64 sm:w-60 sm:round-lg sm:ml-8 sm:mt-8
                        md:object-fill md:h-64 md:w-60 md:round-lg
                        lg:h-64 lg:w-48 lg:round-lg
                        xl:object-fill xl:h-96 xl:w-80 xl:round-lg xl:mx-auto
                        2xl:object-fill 2xl:h-80 2xl:w-64 2xl:round-lg
                        " :src="film.imgUrl" alt="" >
                    <div class="
                        sm:p-4
                        md:p-4
                        lg:p-5
                        xl:p-5
                        2xl:p-5">
                        <h5 class=" font-bold text-white text-balance text
                        text-lg
                        sm:text-xl sm:mt-4
                        md:text-xl
                        lg:text-xl
                        xl:text-2xl
                        2xl:text-2xl  ">{{ film.title }}</h5>
                        <p class="mb-3 font-sans text-gray-400 font-bold text
                        text-sm
                        sm:text-lg
                        md:text-lg
                        lg:text-base
                        xl:text-lg
                        2xl:text-xl "> {{ film.name }}</p>
                        <div class="mb-3 font-sans text-gray-400 text
                        text-sm
                        sm:text-lg
                        md:text-base
                        lg:text-base
                        xl:text-lg
                        2xl:text-lg ">Rating  <p class="ml-4"> {{ film.rating }}</p> </div>

                        <div class="mb-3 font-sans text-gray-400 text
                        text-sm
                        sm:text-base
                        md:text-base
                        lg:text-base
                        xl:text-lg
                        2xl:text-lg   ">Actor <p class="ml-4 text-balance">{{ film.actor }}</p></div>
                    </div>
        </div>
    </div>

</div>
    <footer class="bg-white rounded-lg shadow m-4  sm:text-center">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center sm:items-center md:justify-between sm:justify-between sm:text-center">
      <span class="text-sm text-gray-500 sm:text-center ">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
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


</template>
<style>
.gradient{
    background: linear-gradient(90deg,rgb(168, 85, 247) 0%,rgb(236, 72, 153) 100%);
    border-bottom-color: white;
}
.card:hover .text{
    color: rgb(73, 73, 73);


}

.card:hover .button{
    background-color:  rgb(8 47 73);
    color: white;

}
.card  {
    background-color:  rgb(8 47 73);
    transition: background-color 0.3s ease, color 0.3s ease;
}


</style>
