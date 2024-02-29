<script setup>
import {ref} from 'vue';

const inputData = ref([{key: '', value: ''}, {key: '', value: ''}, {key: '', value: ''}]);
const records = ref([]);
const isLoading = ref(false);
const message = ref('');

const handleSubmit = async () => {
    isLoading.value = true;
    message.value = '';
    records.value = [];

    const transformedInputData = inputData.value.map(item => ({[item.key]: item.value}));

    try {
        const response = await axios.post('api/records/find', {criteria: JSON.stringify(transformedInputData)}, {
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
        isLoading.value = false;
    }
};
</script>

<template>
    <div class="text-center text-gray-500">
        <h1 class="text-3xl md:text-5xl font-bold mb-6">Тестовое задание на должность <br> «Fullstack
            разработчик (Laravel+Vue.JS)»</h1>
        <h2 class="text-xl md:text-3xl">Получение записей по ключу и значению</h2>
    </div>
    <div class="container mx-auto p-4">
        <form class="space-y-4" @submit.prevent="handleSubmit">
            <div v-for="obj in inputData" :key="obj.key" class="flex gap-2">
                <input v-model.trim="obj.key" class="border p-2 w-1/3 rounded" placeholder="Ключ" type="text">
                <input v-model="obj.value" class="border p-2 w-2/3 rounded" placeholder="Значение" type="text">
            </div>
            <button
                v-if="!isLoading"
                :disabled="isLoading"
                class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 text-white py-2 px-4 rounded"
                type="submit">Получить
            </button>
        </form>

        <div v-if="isLoading" class="mt-4">Загружается...</div>
        <div v-if="message" class="text-red-600 mt-4">{{ message }}</div>

        <div v-if="records.length" class="mt-4">
            <table class="border-collapse border border-slate-400 w-full">
                <thead>
                <tr>
                    <th class="border border-slate-300 w-1/6">Id</th>
                    <th class="border border-slate-300 w-1/3">Key</th>
                    <th class="border border-slate-300 w-1/2">Value</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="record in records" :key="record.id">
                    <td class="border border-slate-300 p-2 w-1/6">{{ record.id }}</td>
                    <td class="border border-slate-300 p-2 w-1/3">{{ record.key }}</td>
                    <td class="border border-slate-300 p-2 w-1/2">{{ record.value }}</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
