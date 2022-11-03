<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
// import LandingImage from '@assets/images/garment-landing.png'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="flex items-top justify-center min-h-screen sm:items-center sm:pt-0 object-cover bg-center" id="bg-image">
        <div class="w-screen h-screen">
            <div class="grid grid-cols-2">
                <div></div>
                <div class="flex flex-col items-end justify-center h-screen p-[20px]">
                    <h1 class="text-4xl font-light font-mono text-end capitalize">Sistem Pakar Untuk memilih jenis kain berdasarkan jenis pakaian transformable</h1>
                    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline m-2"><n-button type="info">Back To Dashboard</n-button></Link>
                    <div v-else class="grid grid-cols-2 m-2">
                        <div class="flex justify-center items-center">
                            <Link :href="route('login')">
                                <n-button type="info">Login</n-button>
                            </Link>
                        </div>
                        <div class="flex justify-center items-center">
                            <Link v-if="canRegister" :href="route('register')">
                                <n-button type="tertiary" color="#18281D" ghost>Register</n-button>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="css" scoped>
    #bg-image {
        background-image: url(@assets/images/garment-landing.png);
    }
</style>
