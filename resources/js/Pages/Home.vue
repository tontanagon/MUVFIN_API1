<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Components/Modal.vue';
import { ref ,defineProps, computed} from 'vue'
import { useShoppingStore } from '@/store/cart';
const shoppingStore = useShoppingStore()

const props = defineProps(['films', 'cate','countfilm','prenext']);
const nextPage = ref(parseInt(props.prenext))
console.log(nextPage)


const prePageUrl = () => {
    if(nextPage.value > 1){
        return `/home/${nextPage.value - 1}`
    }

}

const nextPageUrl = () => {
    if(nextPage.value < pageCount){
        return `/home/${nextPage.value + 1}`
    }

}

const itemsPerPage = 8;
const numFilms = props.countfilm;

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

const class_pagination = ref('hidden')
if (props.prenext > 0 ) {
     class_pagination.value = 'flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mb-8'
}




</script>

<template>
    <AppLayout>
        <template #header>
          <div class="py-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                Home
            </h2>

          </div>
            <div class="m-8 "  >
                <a
                class="text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                href="/home/1">
                    All
                </a>

                <a
                    :href="`/home/${i.name}`"
                    type="button"
                    class=" text-white bg-gradient-to-r from-purple-500 via-purple-500 to-purple-500 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-purple-800 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2
                    "
                    v-for="i in cate">
                    {{ i.name }}
                </a>

            </div>



        </template>

<!-- Pagination -->

<div :class="class_pagination">
    <div class="flex flex-1 justify-center">
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <a :href="prePageUrl()" v-if="nextPage > 1" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
            <span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </span>
        </a>
            <!-- Here you can dynamically generate pagination links based on your data -->
            <template v-for="pageNumber in pageCount">
                <a :href="`/home/${pageNumber}`"  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                {{ pageNumber }}</a>
            </template>
        <a :href="nextPageUrl()" v-if="nextPage < pageCount" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>

 </span>
        </a>
      </nav>
    </div>
  </div>



  <!-- card -->
    <div class="columns-1 container max-h-full
    sm:columns-1 sm:container sm:mx-auto sm:px-2
    md:columns-1  md:container md:mx-auto
    lg:columns-1 lg:container lg:mx-auto lg:w-9/12
    xl:grid grid-cols-2 xl:container xl:mx-auto xl:w-full
    2xl:grid grid-cols-2 2xl:container 2xl:mx-auto 2xl:w-full "
   >
        <!-- bg-stone-50 -->
        <!-- bg-sky-950-->
        <a
         v-for="(movie,index) in films"
            @click="showModal(index)">
                <!-- card -->
            <div class="columns-2 pb-4 m-4 hover:bg-stone-100  shadow-lg rounded-lg card ">
                <div class=" mt-4
                sm:pr-16
                md:pr-20
                lg:pr-2
                xl:pr-2
                2xl:pr-2
                ">

                    <img class=" m-6 object-cover h-48 w-auto rounded-lg
                     sm:h-60 sm:w-auto sm:round-lg
                     md:h-68 md:w-auto md:round-lg
                     lg:h-68 lg:w-auto lg:round-lg
                     xl:h-80 xl:w-auto xl:round-lg
                     2xl:h-96 xl:w-auto xl:round-lg
                     " :src="movie.imgUrl" >

                    <h5 class="mt-6 mb-2 text-xl font-bold font-sans tracking-tight text-white break-before-column text hover:text-black
                    sm:text-xl sm:mt-4
                    md:text-3xl
                    lg:text-3xl
                    xl:text-4xl
                    2xl:text-4xl
                    ">{{ movie.title }}</h5>
                    <p class=" text-lg font-medium font-sans text-gray-400 pb-4 text hover:text-blue-950
                    sm:text-lg sm:pt-4
                    md:text-lg
                    lg:text-xl
                    xl:text-xl
                    2xl:text-xl
                    "> {{ movie.name }}</p>
                        <div class="columns-2 text-sm text font-medium font-sans text-gray-400 text hover:text-blue-950
                        sm:text-base
                        md:text-lg
                        lg:text-lg
                        xl:text-lg
                        2xl:text-lg">
                            <p>Rating</p>
                            <p class="pl-2 font-normal">  {{movie.rating}}</p>
                            <p>Length</p>
                            <p class=" font-normal text-balance ">  {{movie.length}} minute</p>
                            </div>
                        <div class="font-medium text-sm h-32 mt-4 font-sans text-gray-400 text hover:text-blue-950
                        sm:text-sm
                        md:text-base
                        lg:text-lg
                        xl:text-lg
                        2xl:text-lg
                        ">
                                Actor
                                <p class="font-normal mt-1 text text-balance "> {{movie.actor}} </p>
                        </div>

                </div>

            </div>

        </a>
    </div>


<Modal :show="modalShow" maxWidth="md" @close="closeModal">
    <div class="bg-white p-8 border-gray-200 shadow md:flex-row md:max-w-xl hover:bg-stone-50 card
    bg-sky-950 font-sans p-8">
        <div class="items-center ">
        <div class="columns-2 ">
            <div class="  flex-grow flex flex-col p-2">
                <img class="object-cover w-full  md:h-auto md:w-auto md:rounded  " :src="props.films[index_num].imgUrl" style="width:200px  ;" alt="">
            </div>
            <div class="flex-grow flex flex-col py-8 text  leading-normal ">
                <h5 class="text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-2xl">{{ props.films[index_num].title }}</h5>
                <p class="text mb-3 font-normal text-gray-400 hover:text-blue-950 "> {{ props.films[index_num].name }}</p>
                <p class="text mb-3 font-normal text-gray-400 ">Rating : {{ props.films[index_num].rating }}</p>
                <p class="text mb-3 font-normal text-gray-400  ">Length : {{ props.films[index_num].length }} minute</p>

            </div>


        </div>


        <div class="columns items-centerleading-normal mt-4 text tracking-tight  text-stone-50 text-justify mb-2 ">
            <p> {{  props.films[index_num].description}}</p>
        </div>
        <button
        type="button"
        @click="shoppingStore.addToCart(
            1,
            props.films[index_num].title,
            props.films[index_num].name,
            props.films[index_num].price,
            props.films[index_num].imgUrl,
            props.films[index_num].length
        )"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black button rounded-lg bg-stone-50  focus:ring-4 focus:outline-none focus:ring-blue-300  ">
        Add to cart
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" >
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
        </button>
    </div>
    </div>

    </Modal>





<!-- Pagination -->

<div :class="class_pagination">
    <div class="flex flex-1 justify-center">
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <a :href="prePageUrl()" v-if="nextPage > 1" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
            <span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </span>
        </a>
            <!-- Here you can dynamically generate pagination links based on your data -->
            <template v-for="pageNumber in pageCount">
                <a :href="`/home/${pageNumber}`"  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                {{ pageNumber }}</a>
            </template>
        <a :href="nextPageUrl()" v-if="nextPage < pageCount" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>

 </span>
        </a>
      </nav>
    </div>
  </div>


    </AppLayout>

</template>
<style>


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
