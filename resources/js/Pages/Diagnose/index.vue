<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { NCard, NCheckbox } from 'naive-ui'

const props = defineProps({
    symptoms: Array
});

const selected = reactive([])

const selectSymptoms = (code) => {
    if (selected.includes(code)) {
        const idx = selected.findIndex(s => s === code)
        selected.splice(idx, 1)
    } else {
        selected.push(code)
    }
}

const submit = () => {
    Inertia.post('/diagnose', { selected })
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Diagnose
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <n-list hoverable clickable>
                    <n-list-item v-for="(symptom, i) in props.symptoms" :key="i" @click="selectSymptoms(symptom.id)">
                        <div class="flex justify-between">
                            <div :class="selected.includes(symptom.id) ? 'text-green-600' : 'text-black'">{{ symptom.symptom }}</div>
                            <div><n-checkbox :checked="selected.includes(symptom.id)"></n-checkbox></div>
                        </div>
                    </n-list-item>
                </n-list>
                <div class="flex justify-center mt-4">
                    <div>
                        <n-button class="bg-green-600" :disabled="selected.length === 0" @click="submit">
                            Submit
                        </n-button>
                        <n-button @click="selected.splice(0)">
                            Reset
                        </n-button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
