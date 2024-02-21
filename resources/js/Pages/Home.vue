<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

import Modal from '@/Components/Modal.vue';
import { ref ,defineProps } from 'vue'
import axios from 'axios';

const page = ref(1)
const url = `/home/${page.value}`;

axios.get(url)
    .then(response => {
        // Handle response
    })
    .catch(error => {
        // Handle error
    });


const props = defineProps(['films', 'cate']);

const itemsPerPage = 8;
const numFilms = props.films.length;
const pageCount = Math.ceil(numFilms / itemsPerPage);

const index_num = ref();
let modalShow = ref(false);
const showModal = (index) => {
    index_num.value = index

    modalShow.value = true;
};
const closeModal = () => {
  modalShow.value = false;
};


//import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'










</script>

<template>
    <AppLayout>
        <template #header>
          <div class="py-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                Home
            </h2>

          </div>

                <button
        type="button"
        @click="handleClick"
        class="text-white bg-gradient-to-r from-pink-400 to-purple-500 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        All
    </button>

    <button
        type="button"
        class="text-white bg-gradient-to-r from-purple-500 via-purple-500 to-purple-500 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-purple-800 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        v-for="i in cate">
        {{ i.name }}
    </button>
        </template>

        <div class="flex flex-row " >


        </div>

<!-- Pagination -->

<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="flex flex-1 items-center justify-center">
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span> < </span>
            </a>
            <!-- Here you can dynamically generate pagination links based on your data -->
            <template v-for="pageNumber in pageCount">
                <a href="#"  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ pageNumber }}</a>
            </template>
            <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span> > </span>
            </a>
        </nav>
    </div>
</div>




<div class="flex flex-row p-12">
    <div class="gap-8 columns-2  container mx-auto">
        <!-- card -->
<a href="#"
    @click="showModal(movie.film_id -1)"
    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 font-sans"
    v-for="(movie) in films">
    <img class=" object-cover w-full  md:h-auto md:w-auto  md:rounded " :src="movie.imgUrl" style="width: 150px   ;" alt="">
    <div class=" flex-grow flex flex-col justify-between p-4 leading-normal col-span-2">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-2xl">{{ movie.title }}</h5>
        <p class="mb-3 font-normal text-gray-400 dark:text-gray-400 text-xl"> {{ movie.name }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rating : {{movie.rating}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 ">Length : {{movie.length}}</p>
    </div>
</a>
<!-- model -->
<Modal :show="modalShow" maxWidth="md" @close="closeModal">
    <div class="bg-white p-8 border border-gray-200 shadow md:flex-row md:max-w-xl hover:bg-gray-100
        dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 font-sans">
        <div class="items-center ">
        <div class="columns-2 ">
            <div class="  flex-grow flex flex-col p-2">
                <img class="object-cover w-full  md:h-auto md:w-auto md:rounded " :src="props.films[index_num].imgUrl" style="width:200px  ;" alt="">
            </div>
            <div class="flex-grow flex flex-col py-8 leading-normal ">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-2xl">{{ props.films[index_num].title }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ props.films[index_num].name }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rating : {{ props.films[index_num].rating }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 ">Length : {{ props.films[index_num].length }} minute</p>

            </div>

        </div>


        <div  class="columns items-centerleading-normal mt-4  tracking-tight text-gray-900 dark:text-white text-justify">
            <p> {{  props.films[index_num].description}}</p>
        </div>

    </div>
    </div>

    </Modal>
    </div>
</div>









    </AppLayout>

</template>
