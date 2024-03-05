<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    transactions: {
        type: Array,
    },
});

const GetTransactionType = (type) => {
    if (type === 'Income') {
        return `<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                Entrata
            </span>`
    } else {
        return `<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Uscita</span>`
    }
}


</script>

<template>
    <Head title="Transazioni" />

    <AuthenticatedLayout>
        <template #header >
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <h2 class="col-span-4 font-semibold text-xl text-gray-800 leading-tight">Transazioni</h2>
                <Link :href="route('transactions.create')" class="col-start-5 text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuova transazione</Link>
            </div>
        </template>

        <div class="container max-w-7xl mt-12 md:mt-24">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tipo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrizione
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Importo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Categoria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Account
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr 
                        v-for="transaction in transactions.data"
                        :key="transaction.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" v-html="GetTransactionType(transaction.transaction_type.title)">
                            </th>
                            <td class="px-6 py-4">

                                {{ transaction.date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.description }}
                            </td>
                            <td class="px-6 py-4">
                               € {{ parseFloat(transaction.amount).toFixed(2) }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.subcategory.title }} > {{ transaction.subcategory.category.title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.account.title }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <Link :href="route('transactions.edit', transaction.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifica</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <Pagination :links="transactions.links"></Pagination>

        </div>
    </AuthenticatedLayout>
</template>
