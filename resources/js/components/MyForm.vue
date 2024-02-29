<script setup>
import {ref} from 'vue';

const inputData = ref([{key: '', value: ''}]);
const records = ref([]);
const loading = ref(false);
const message = ref('');

const handleSubmit = async () => {
    loading.value = true;
    message.value = '';
    records.value = [];

    const transformedInputData = inputData.value.reduce((acc, item) => {
        acc[item.key] = item.value;
        return acc;
    }, {});

    try {
        const response = await axios.post('api/records/find', { inputData: JSON.stringify(transformedInputData) }, {
            headers: {
                'Content-Type': 'application/json',
            },
        })
        if (response.data.length) {
            records.value = response.data;
        } else {
            message.value = 'Записи не найдены.';
        }
    } catch (error) {
        message.value = 'Произошла ошибка.';
        console.error(error);
    } finally {
        loading.value = false;
    }
};
</script>

<template>
    <div class="text-center text-gray-500">
        <h1 class="text-5xl font-bold mb-6">Тестовое задание на должность <br> «Fullstack
            разработчик (Laravel+Vue.JS)»</h1>
        <h2 class="text-3xl">Получение записей по ключу и значению</h2>
    </div>
    <div class="container mx-auto p-4">
        <form class="space-y-4" @submit.prevent="handleSubmit">
            <div v-for="(inputData, index) in inputData" :key="index" class="flex gap-2">
                <input v-model="inputData.key" class="border p-2 w-1/3 rounded" placeholder="Ключ" type="text">
                <input v-model="inputData.value" class="border p-2 w-2/3 rounded" placeholder="Значение" type="text">
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Получить</button>
        </form>

        <div v-if="loading" class="mt-4">Loading...</div>
        <div v-if="message" class="text-red-600 mt-4">{{ message }}</div>

        <div v-if="records.length" class="mt-4">
            <table class="border-collapse border border-slate-400 w-full">
                <thead>
                <tr>
                    <th class="border border-slate-300">Key</th>
                    <th class="border border-slate-300">Value</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(record, index) in records" :key="index">
                    <td class="border border-slate-300 p-2">{{ record.key }}</td>
                    <td class="border border-slate-300 p-2">{{ record.value }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
