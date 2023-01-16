<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { reactive } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import { NCard, NCheckbox, NButton } from 'naive-ui'

const props = defineProps({
    final: Array,
    max: Array
});

const selected = reactive([])

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Diagnose
            </h2>
        </template>

        <div class="py-12 px-12">
            <div class="grid grid-cols-2">
                <div class="flex flex-col mx-auto w-full">
                    <div v-for="(res, i) in props.final" :key="i" class="flex flex-col justify-center align-middle">
                        <span class="text-center my-3">{{ i }}</span>
                        <n-progress class="mx-auto" type="dashboard" gap-position="bottom" :percentage="Math.round((res.sum + Number.EPSILON) * 100)" ><span style="text-align: center">{{ Math.round((res.sum + Number.EPSILON) * 100) / 100 }} %</span></n-progress>
                    </div>
                </div>
                <div>
                    <div class="block text-center gap-8">
                        hasil diagnosa:
                        <h3 class="text-xl mb-[40px] p-3">{{ props.max.nama_penyakit }}</h3>
                        saran:
                        <h3 class="text-xl mb-[40px] p-3">{{ props.max.saran }}</h3>
                        informasi:
                        <h3 class="text-xl mb-[40px] p-3">{{ props.max.informasi }}</h3>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <Link :href="route('diagnose.index')"><n-button type="info">Kembali</n-button></Link>
            </div>
        </div>
    </AppLayout>
</template>
