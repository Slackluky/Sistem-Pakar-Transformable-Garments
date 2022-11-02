<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { reactive } from 'vue';
import Luky from '@assets/images/luky.jpg'
import Mr from '@assets/images/mr.jpg'

const developers = reactive([
    {name: 'Luky Setiawan', img: Luky},
    {name: 'Yumarlin', img: Mr}
])
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Developers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid sm:grid-cols-1 md:grid-cols-2">
                    <n-card v-for="(e, i) in developers" :key="i" class="p-[100px]">
                        <template #cover>
                            <img :src="e.img" class="h-[300px] w-[300px] object-cover rounded-lg">
                        </template>
                        <div class="flex justify-center p-3">
                            <span class="font-medium text-lg">{{ e.name }}</span>
                        </div>
                    </n-card>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
