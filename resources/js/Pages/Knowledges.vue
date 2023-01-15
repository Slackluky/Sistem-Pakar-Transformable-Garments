<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { reactive } from 'vue';
import { NCard } from 'naive-ui'

const props = defineProps({
    rules: Array,
    drugs: Array,
    symptoms: Array
});
const ruleColumns = [
    {
      title: "Rule Code",
      key: "code",
      align: 'center'
    },
    {
      title: "Probability",
      key: "probability",
      align: 'center'
    },
    {
      title: "Symptom(Gejala)",
      key: "symptoms.symptom",
      align: 'center'
    },
    {
      title: "Symptoms Code",
      key: "symptoms.code",
      align: 'center'
    },
    {
      title: "Drug Type(Nama Zat)",
      key: "drugs.drug",
      align: 'center'
    },
    {
      title: "Drugs Code",
      key: "drugs.code",
      align: 'center'
    },
  ];

const drugsColumn = [
    {
      title: "Drug code",
      key: "code",
      align: 'center'
    },
    {
      title: "Drug name",
      key: "drug",
      align: 'center'
    },
    {
      title: "Information",
      key: "information",
      align: 'center',
      className: 'text-ellipsis',
      width: '20vw'
    },
    {
      title: "Advice",
      key: "advice",
      align: 'center',
      className: 'text-ellipsis',
      width: '20vw'
    },
]

const symptomColumn = [
    {
      title: "Symptom code",
      key: "code",
      align: 'center'
    },
    {
      title: "Symptom name",
      key: "symptom",
      align: 'center'
    },
]


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
                <n-card title="Rule Table">
                    <n-data-table
                    :columns="ruleColumns"
                    :data="props.rules"
                    :pagination="false"
                    :bordered="true"
                   />
                </n-card>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <n-card title="Drugs Table">
                    <n-data-table
                    :columns="drugsColumn"
                    :data="props.drugs"
                    :pagination="false"
                    :bordered="true"
                   />
                </n-card>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <n-card title="Symptoms Table">
                    <n-data-table
                    :columns="symptomColumn"
                    :data="props.symptoms"
                    :pagination="false"
                    :bordered="true"
                   />
                </n-card>
            </div>
        </div>
    </AppLayout>
</template>
