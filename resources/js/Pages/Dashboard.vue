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
                    <span>Zat adiktif adalah zat terkandung di dalam obat-obatan dan bahan aktif yang menyebabkan ketergantungan. Dampaknya, menjadi kecanduan dan membuat tubuh ingin mengonsumsinya terus-menerus.

                        Saat mencoba berhenti mengonsumsi zat adiktif, tubuh akan merespon dengan merasa cepat lelah, rasa tidak nyaman dan muncul rasa sakit yang luar biasa (sakau). Salah satu contohnya adalah narkoba.

                        Sederhananya, zat adiktif bisa membahayakan tubuh dan seharusnya dihindari. Bukan hanya narkoba saja, zat adiktif juga terkandung dalam rokok. Karena itu, perokok terlihat sangat kesulitan untuk berhenti.
                        Jika digunakan dalam jangka panjang, zat adiktif memicu perubahan struktur di otak. Alasannya, ketika digunakan, zat memberikan tanggapan dengan mengeluarkan dopamin yang memberikan reaksi rasa nyaman dan menyenangkan.

                        Sensasi rasa nyaman dan menyenangkan itu direkam oleh otak sebagai sesuatu yang dibutuhkan. Saat merasa galau atau sedih, otak menyampaikan keinginan agar mengonsumsi zat adiktif untuk mengembalikan perasaan menyenangkan.

                        Saya telah membuat Program untuk mengidentifikasi zat apakah yang sedang mempengaruhi seseorang yang dicurigai tengah / habis memakai zat zat tersebut untuk membantu dalam hal menangani seseorang dengan lebih tepat
                    </span>
                    <Link :href="route('diagnose.index')"><n-button type="info">Diagnosa</n-button></Link>
                    <div class="flex align-middle justify-center">
                        <img src="https://www.heroesmile.com/wp-content/uploads/2021/11/shutterstock_413804086.jpg.webp" style="width: 50%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
