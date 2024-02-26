<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

defineProps(['films']);



</script>

<template>
    <AppLayout title="Cart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order History
            </h2>
        </template>





  <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b ">Img</th>
          <th class="py-2 px-4 border-b ">Title</th>
          <th class="py-2 px-4 border-b ">Cate name</th>
          <th class="py-2 px-4 border-b ">Week</th>
          <th class="py-2 px-4 border-b ">price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <img :src="films[1].imgUrl" alt="" width="150 px">
            <td class="border border-slate-300 px-24 py2 ">{{ films[1].title }}</td>
            <td class="border border-slate-300 px-24 py2 ">8;p8;p8;p</td>
            <td class="border border-slate-300 px-24 py2 ">5</td>
            <td class="border border-slate-300 px-24 py2 ">price</td>
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
  </div>

    </AppLayout>
</template>
ี
