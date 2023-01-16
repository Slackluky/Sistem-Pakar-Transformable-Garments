<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 text-center flex flex-col align-middle justify-center gap-5">
                    <span>
                        Pada saat di halaman Diagnose, pastikan sudah memilih minimal 1 gejala pada daftar yang sudah disediakan, reset untuk meng uncheck pilihan, submit untuk mulai diagnosa
                    </span>
                    <div class="flex align-middle justify-center">
                        <img src="@assets/images/guides-1.png" style="width: 50%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
