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
    max-w-none
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


<footer class="gradient mt-8">
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="evenodd">
          <g class="wave" fill="#FFFFFF">
            <path
              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
            ></path>
          </g>
          <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>
    <div class="mx-auto gradient mt-5
    max-w-none
    max-w-screen-sm
    max-w-screen-md
    max-w-screen-lg
    max-w-screen-xl
    max-w-screen-2xl">
        <!-- <h2 class="text-sm font-semibold text-center text-white uppercase
        text-base
         md:text-base
         lg:text-base
         xl:text-base
         2xl:text-lg
         ">About Us  </h2> -->
      <div class="grid grid-cols-1 gap-2 px-8 py-4
       sm:grid-cols-2 md:mx-auto
       md:grid-cols-2 md:gap-2
       lg:grid-cols-4 lg:gap-8
       xl:grid-cols-4 xl:gap-2
       2xl:grid-cols-4 2xl:gap-8">
        <div class="
        col-1
        sm:col-start
        md:col-start
        lg:col-start-2
        xl:col-start-2
        2xl:col-start-2 ">
        <h2 class="mb-6 text-sm font-semibold text-start text-white uppercase
        text-base
         md:text-base
         lg:text-base
         xl:text-base
         2xl:text-md">About Us</h2>
            <ul class="text-white font-medium text-start
            text-sm
            sm:text-sm
            md:text-sm
            lg:text-sm
            xl:text-base
            2xl:text-base">

                <li class="mb-4">
                    <a href="#" class="hover:underline">tipyada20@gmail.com</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">tontanagon555@gmail.com</a>
                </li>
                <li class="mb-4">
                    <a href="#" class=" hover:underline">tossapontasupan9@gmail.com</a>
                </li>
            </ul>
        </div>
        <div class="mt-6
        col-1
        sm:col-end
        md:col-start
        lg:col-start-3
        xl:col-start-3
        2xl:col-start-3">
            <ul class="mt-6 text-white font-medium text-start
            text-sm
            sm:text-sm
            md:text-sm
            lg:text-sm
            xl:text-base
            2xl:text-base">
                <li class="mb-4">
                    <a href="#" class="hover:underline">jokejee29@gmail.com</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">pmpyyyoyo2@gmail.com</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">kdftvguitarandarmy@gmail.com</a>
                </li>
            </ul>
        </div>

    </div>
    <div class="px-4 py-6 gradient  md:flex md:items-center md:justify-between">
        <p class="text-sm text-white sm:text-center md:text-center">© 2024 <a href="https://flowbite.com/">MUVFIN™</a>. All Rights Reserved.
        </p>
        <div class="flex mt-4  sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <a href="#" class=" text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
        </div>
      </div>
    </div>
</footer>




<!-- <footer class="bg-white rounded-lg shadow m-4  sm:text-center">
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
</footer> -->


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
